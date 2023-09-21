<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>フォローリクエスト</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    </x-slot>
    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1>フォローリクエスト</h1><br>
                        <div class="request">
                            <form action="/send-friend-request" method="post">
                            @csrf
                            <label for="username" class="name-input">ユーザー名を入力してください：</label>
                            <input type="text" class="request-input"name='user[user_id]' required /><br>
                            <div class="submit-footer">
                                <div class="submit">
                                    <button type="submit">フォローする</button>
                                </div>
                                @if(session('error'))
                                    <div class="alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
            
                                @if(session('success'))
                                    <div class="alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                </form>
                                <div class="backButton">
                                    <a href="/users">戻る</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>