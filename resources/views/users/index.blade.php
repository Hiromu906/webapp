<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ユーザー情報</title>
        <link rel="stylesheet" href="css/style.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ユーザー') }}
        </h2>
    </head>
    </x-slot>
    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="user-info">
                            <a href="users/followees">フォロー  :{{ $followees }}</a><br>
                            <a href="users/followers">フォロワー:{{ $followers }}</a><br><br>
    
                            <a href="/users/request">フォロー送信</a><br><br>
    
                            <a href="/users/shareEvents">共有中のイベント</a><br>
                            <a href="/users/sharedEvents">共有されているイベント</a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>