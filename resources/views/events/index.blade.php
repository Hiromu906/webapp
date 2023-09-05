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
        <h1>予定一覧</h1>
        <div class='events'>
            @foreach($events as $event)
            <div class='event'>
                <h2 class='title'>
                    <a href="/events/{{ $event->id }}">{{ $event->title }}</a>
                </h2>
                <p class='body'>{{ $event->body }}</p>
                <p class='start_time'>{{ $event->start_time }}</p>
                <a href="events/{{ $event->id }}/share">共有</a>
            </div>
            @endforeach
            <div class='paginate'>
                {{ $events->links() }}
            </div>
            <a href='/events/create'>新規予定作成</a>
            <div>ログインユーザー:{{ Auth::user()->name }}</div>
        </div>
    </body>
    </x-app-layout>
</html>