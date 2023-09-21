<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Events</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="../../css/style.css">
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
                        <h1 class="title">
                            {{ $event->title }}
                        </h1>
                        <div class="content">
                            <div class="content__event">
                                <h2>詳細情報</h2>
                                <p>{{ $event->description }}</p>
                                <p>開始時間:{{ $event->start_time }}</p>
                                <p>終了時間:{{ $event->end_time }}</p>
                                <p>場所:{{ $event->location }}</p>
                                <p>通知日:{{ $event->send_at }}</p>
                                <p>公開状況:{{ $event->is_release == 1 ? '公開' : '非公開' }}</p>
                
                                <p>共有相手</p>
                                <ul>
                                    @foreach($sharingUsers as $sharingUser)
                                    <li>{{ $sharingUser->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="footer">
                            <a href="/users/sharedEvents">戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>