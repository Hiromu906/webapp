<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <title>Events List</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
            </div>
            @endforeach
            <div class='paginate'>
                {{ $events->links() }}
            </div>
            <a href='/events/create'>create</a>
            <div>ログインユーザー:{{ Auth::user()->name }}</div>
        </div>
    </body>
    </x-app-layout>
</html>