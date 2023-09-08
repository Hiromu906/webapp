<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <title>ユーザー情報</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    </x-slot>
    <body>
        <h1>ユーザー</h1>
        <div>ユーザー名:{{ Auth::user()->name }}</div>
        
        <a href="users/followees">フォロー  :{{ $followees }}</a><br>
        <a href="users/followers">フォロワー:{{ $followers }}</a><br>
        
        <a href="/users/request">フォローリクエスト</a><br>
        
        <a href="/users/shareEvents">共有中のイベント</a><br>
        <a href="/users/sharedEvents">共有されているイベント</a><br>
    </body>
    </x-app-layout>
</html>