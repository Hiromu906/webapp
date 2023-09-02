<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>フォローリクエスト</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    </x-slot>
    <body>
        <h1>フォローリクエスト</h1>
    
        <form action="/send-friend-request" method="post">
            @csrf
            <label for="username">ユーザー名を入力してください：</label>
            <input type="text" name='user[name]' required><br>
            <button type="submit">フォローする</button>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </form>
    
        
        
    </body>
    </x-app-layout>
</html>