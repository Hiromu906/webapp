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
        <h1>共有されている予定一覧</h1>
        @if($sharedEvents->isNotEmpty())
            <div class='sharedEvents'>
                @foreach($sharedEvents as $sharedEvent)
                <div class='event'>
                    <h2 class='title'>
                        <a href="/users/sharedEvents/{{ $sharedEvent->id }}">{{ $sharedEvent->title }}</a>
                    </h2>
                    <p class='start_time'>{{ $sharedEvent->start_time }}</p>
                </div>
                @endforeach
                <div>ログインユーザー:{{ Auth::user()->name }}</div>
                <div class="footer">
                    <a href="/users">戻る</a>
                </div>
            </div>
        @else
            <p>共有されている予定はありません</p>
            <div>ログインユーザー:{{ Auth::user()->name }}</div>
            <div class="footer">
                    <a href="/users">戻る</a>
            </div>
        @endif
    </body>
    </x-app-layout>
</html>