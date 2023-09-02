<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Friend;
class UserController extends Controller
{
     public function index(Friend $friend){
        $userId = Auth::id();
        $followerIds=Friend::where('followee_id',$userId)->pluck('follower_id');
        $followers = User::whereIn('id',$followerIds)->get();
        return view('users.index',compact('friend'));
    }
    public function show(){
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
    
   
}
