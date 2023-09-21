<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Friend;
use App\Models\Event;
use App\Models\SharedEvent;
use Carbon\Carbon;
class UserController extends Controller
{
     public function index(Friend $friend){
        $userId = Auth()->user()->user_id;
        
        $followers=Friend::where('followee_id',$userId)->count();
        $followees=Friend::where('follower_id',$userId)->count();
        
        return view('users.index',compact('followees','followers'));
    }
    
    public function displayRequest(){
        return view('users.request');
    }
    
    public function request(Request $request, Friend $friend){
        // フォームから送信されたユーザー名を取得
        $userId = $request->input('user.user_id');//フォロー先user_id
        
        // ユーザーIDを使用して該当するユーザーを検索
        $user = User::where('user_id', $userId)->first();
        $AuthId = Auth()->user()->user_id;
        if ($user) {
            $existingFriendship = Friend::where('follower_id',$AuthId)
            ->where('followee_id', $user->user_id)
            ->first();
            
            if ($existingFriendship) {
                // すでにフォローしている場合、エラーメッセージをリダイレクト先に渡す
                return redirect('/users/request')->with('error', 'すでにフォローしています。');
            }else if($AuthId === $userId) {
                return redirect('/users/request')->with('error', '自分自身をフォローすることはできません。');
            }
            // フォローリクエストを作成し、データベースに保存
            $friendRequest = new Friend();
            $friendRequest->follower_id = $AuthId; // ログインユーザーのID
            $friendRequest->followee_id = $userId; // フォロー対象ユーザーのID
            $friendRequest->save();
            // フォローリクエストが成功したことを示すメッセージをリダイレクト先に渡す
            return redirect('/users')->with('success', 'フォローリクエストを送信しました！');
        } else {
            // 該当するユーザーが見つからない場合、エラーメッセージをリダイレクト先に渡す
            return redirect('/users/request')->with('error', '該当するユーザーが見つかりませんでした。');
        }
    }
    
    public function followers(){
        // ログインユーザーのフォロワー一覧を取得
        $userId = Auth()->user()->user_id;
        $followersId=Friend::where('followee_id',$userId)->pluck('follower_id')->toArray();
        $followers=User::whereIn('user_id',$followersId)->get();
        
        return view('users.follower', compact('followers'));
    }
    
    public function followees(){
        // ログインユーザーのフォロー一覧を取得
        $userId = Auth()->user()->user_id;
       
        $followeesId=Friend::where('follower_id',$userId)->pluck('followee_id')->toArray();
        $followees=User::whereIn('user_id',$followeesId)->get();
        return view('users.followee', compact('followees'));
    }
    
    public function followerShow($id){
        $AuthUser = Auth()->user()->user_id;
        $user = User::find($id);
        $userId = $user->user_id;
        $event = Event::where('user_id',$userId)->where('is_release', 1)->get();
        if ($event->isEmpty()) {
            $message = '予定が存在しません。';
            return view('users.follower_profile', compact('user', 'message'));
        }
        foreach ($event as $eventItem) {
            // データベースから日時データを取得（例：$eventItem->start_time
            $datetime = $eventItem->start_time;
            // Carbonを使用して年月日を取得
            $date = Carbon::parse($datetime)->format('Y年m月d日');
        }
        $shareEventsId = sharedEvent::where('sharing_user_id',$AuthUser)->where('shared_user_id',$userId)->pluck('event_id')->toArray();
        $shareEventsId2 = sharedEvent::where('sharing_user_id',$userId)->where('shared_user_id',$AuthUser)->pluck('event_id')->toArray();
        if($shareEventsId == null && $shareEventsId2 == null){
            $message2 = '共有中の予定はありません。';
            return view('users.follower_profile', compact('user','event','date','message2'));
        }
        $shareEvents = Event::whereIn('id',$shareEventsId)->get();
        $shareEvents2 = Event::whereIn('id',$shareEventsId2)->get();
        return view('users.follower_profile', compact('user','event','date','shareEvents','shareEvents2'));
    }
    
    public function followeeShow($id){
        $AuthUser = Auth()->user()->user_id;
        $user = User::find($id);
        $userId = $user->user_id;
        $event = Event::where('user_id',$userId)->where('is_release', 1)->get();
        if ($event->isEmpty()) {
            $message = '予定が存在しません。';
            return view('users.followee_profile', compact('user', 'message'));
        }
        foreach ($event as $eventItem) {
            // データベースから日時データを取得（例：$eventItem->start_time
            $datetime = $eventItem->start_time;
            // Carbonを使用して年月日を取得
            $date = Carbon::parse($datetime)->format('Y年m月d日');
        }
        
        $shareEventsId = sharedEvent::where('sharing_user_id',$AuthUser)->where('shared_user_id',$userId)->pluck('event_id')->toArray();
        $shareEventsId2 = sharedEvent::where('sharing_user_id',$userId)->where('shared_user_id',$AuthUser)->pluck('event_id')->toArray();
        if($shareEventsId == null){
            $message2 = '共有中の予定はありません。';
            return view('users.followee_profile', compact('user','event','date','message2'));
        }
        $shareEvents = Event::whereIn('id',$shareEventsId)->get();
        $shareEvents2 = Event::whereIn('id',$shareEventsId2)->get();
        return view('users.followee_profile', compact('user','event','date','shareEvents','shareEvents2'));
    }
    
    public function showShareEvents(){
        $user = Auth()->user()->user_id;
        $shareEventsId = SharedEvent::where('sharing_user_id',$user)->get('event_id');
        
        $shareEvents = Event::whereIn('id',$shareEventsId)->get();
        if($shareEvents->isempty()){
            $message = '共有中の予定はありません。';
            return view('users.sharing_events',compact('message','shareEvents'));
        }
        return view('users.sharing_events',compact('shareEvents'));
    }
    
    public function showSharedEvents(){
        $user = Auth()->user()->user_id;
        $sharedEventsId = SharedEvent::where('shared_user_id',$user)->get('event_id');
        $sharedEvents = Event::whereIn('id',$sharedEventsId)->orderBy('start_time')->get();
        return view('users.shared_events',compact('sharedEvents'));
    }
    
    public function showShareEvent($id){
        $event = Event::where('id',$id)->first();
        $shareUsers = SharedEvent::where('event_id',$id)->get('shared_user_id');
        $users = User::whereIn('user_id',$shareUsers)->get();
        return view('users.show_sharing_event')->with([
            'event' => $event,
            'sharedUsers' => $users,
            ]);
    }
    public function showSharedEvent($id){
        $event = Event::where('id',$id)->first();
        $shareUsers = SharedEvent::where('event_id',$id)->get('sharing_user_id');
        $users = User::whereIn('user_id',$shareUsers)->get();
        return view('users.show_shared_event')->with([
            'event' => $event,
            'sharingUsers' => $users,
            ]);
    }
}
