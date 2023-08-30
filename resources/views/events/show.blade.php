<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Events</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    </x-slot>
    <body>
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
            </div>
        </div>
        <div class="edit"><a href="/events/{{ $event->id }}/edit">edit</a></div>
        <form action="/events/{{ $event->id }}" id="form_{{ $event->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deleteEvent({{ $event->id }})">delete</button> 
        </form>
        <script>
            function deleteEvent(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        <div class="footer">
            <a href="/events">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>