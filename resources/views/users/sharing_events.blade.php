<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <title>Events List</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    </x-slot>
    <body>
        <h1>共有中の予定一覧</h1>
        @if($shareEvents->isNotEmpty())
            <div class='shareEvents'>
                @foreach($shareEvents as $shareEvent)
                <div class='event'>
                    <h2 class='title'>
                        <a href="/users/shareEvents/{{ $shareEvent->id }}">{{ $shareEvent->title }}</a>
                    </h2>
                    <p class='start_time'>{{ $shareEvent->start_time }}</p>
                </div>
                @endforeach
                <div>ログインユーザー:{{ Auth::user()->name }}</div>
            </div>
            <div class="footer">
                <a href="/users">戻る</a>
            </div>
        @else
            <p>共有中の予定はありません</p>
            <div class="footer">
                <a href="/users">戻る</a>
            </div>
        @endif
    </body>
    </x-app-layout>
</html>