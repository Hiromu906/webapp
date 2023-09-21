<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Friend;
class FriendController extends Controller
{
    public function follower(Friend $friend){
        // ログインしているユーザーのIDを取得
        $userId = Auth->user()->user_id;
        // フォローしている友達のリストを取得
        $friends = Friend::where('followee_id', $userId)->get();
        // ここで友達の情報を取得する処理を行う
        return view('users.follower', compact('friends'));
    }
    
    public function request(){
        return view('users.request');
    }
    
    public function getUserInfo($username) {
        $user = User::where('user_id', $username)->first();
        return response()->json($user);
    }
 
}
