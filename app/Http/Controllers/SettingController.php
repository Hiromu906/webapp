<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        // 設定画面の表示内容を生成する処理
        return view('settings.index');
    }
}
