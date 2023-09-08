<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ユーザー表示</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    </x-slot>
   <body>
        <h1>ユーザー</h1>
        <div>ユーザー名:{{ $user->name }}</div>
        <h1>予定一覧</h1>
        @if(isset($event))
            @foreach($event as $eventItem)
            <div>予定タイトル:{{ $eventItem->title }}</div>
            <div>予定開始日時:{{ $date }}</div>
            @endforeach
        @else
            <p> {{ $message }} </p>
        @endif
        <h1>このユーザーと共有中の予定</h1>
        @if(isset($shareEvents))
            @foreach($shareEvents as $shareEvent)
                <div>予定タイトル:{{ $shareEvent->title }}</div>
            @endforeach
        @else
            <p> {{ $message2 }}</p>
        @endif
        <div class="footer">
            <a href="/users/followees">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>