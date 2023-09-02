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
        <div>フォロワー:{{ $friend->id }}</div>
        <a href="/users/request">フォローリクエスト</a>
    </body>
    </x-app-layout>
</html>