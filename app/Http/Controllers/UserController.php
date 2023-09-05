<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Friend;
use App\Models\Event;
use Carbon\Carbon;
class UserController extends Controller
{
     public function index(Friend $friend){
        $userId = Auth::id();
        
        $followers=Friend::where('followee_id',$userId)->count();
        $followees=Friend::where('follower_id',$userId)->count();
        return view('users.index',compact('followees','followers'));
    }
    
    public function displayRequest(){
        return view('users.request');
    }
    
    public function request(Request $request, Friend $friend){
        // フォームから送信されたユーザー名を取得
        $username = $request->input('user.name');

        // ユーザー名を使用して該当するユーザーを検索
        $user = User::where('name', $username)->first();
        if ($user) {
            $existingFriendship = Friend::where('follower_id', auth()->id())
            ->where('followee_id', $user->id)
            ->first();
            if ($existingFriendship) {
                // すでにフォローしている場合、エラーメッセージをリダイレクト先に渡す
                return redirect('/users')->with('error', 'すでにフォローしています。');
            }else if(auth()->id() === $user->id) {
                return redirect('/users')->with('error', '自分自身をフォローすることはできません。');
            }
            // フォローリクエストを作成し、データベースに保存
            $friendRequest = new Friend();
            $friendRequest->follower_id = auth()->id(); // ログインユーザーのID
            $friendRequest->followee_id = $user->id; // フォロー対象ユーザーのID
            $friendRequest->save();
            // フォローリクエストが成功したことを示すメッセージをリダイレクト先に渡す
            return redirect('/users')->with('success', 'フォローリクエストを送信しました！');
        } else {
            // 該当するユーザーが見つからない場合、エラーメッセージをリダイレクト先に渡す
            return redirect('/users')->with('error', '該当するユーザーが見つかりませんでした。');
        }
    }
    
    public function followers(){
        // ログインユーザーのフォロワー一覧を取得
        $userId = Auth::id();
        $followersId=Friend::where('followee_id',$userId)->pluck('follower_id')->toArray();
        $followers=User::whereIn('id',$followersId)->get();
        return view('users.follower', compact('followers'));
    }
    
    public function followees(){
        // ログインユーザーのフォロー一覧を取得
        $userId = Auth::id();
        $followeesId=Friend::where('follower_id',$userId)->pluck('followee_id')->toArray();
        $followees=User::whereIn('id',$followeesId)->get();
        return view('users.followee', compact('followees'));
    }
    
    public function followerShow($id){
        $user = User::find($id);
        $event = Event::where('user_id',$id)->where('is_release', 1)->get();
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
        return view('users.follower_profile', compact('user','event','date'));
    }
    
   public function followeeShow($id){
        $user = User::find($id);
        $event = Event::where('user_id',$id)->where('is_release', 1)->get();
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
        return view('users.followee_profile', compact('user','event','date'));
    }
}
