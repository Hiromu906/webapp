<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <title>Events List</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js"></script>
        <script>
            function push(){
                Push.create('予定情報');
            }
        </script>
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
            <form action="/events/{{ $event->id }}" id="form_{{ $event->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $event->id }})" class="deleteButton">削除</button> 
            </form>
            <script>
                function deletePost(id) {
                    'use strict'

                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
            @endforeach
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class='paginate'>
                {{ $events->links() }}
            </div>
            <a href='/events/create'>新規予定作成</a>
            <div>ログインユーザー:{{ Auth::user()->name }}</div>
        </div>
        <input type="button" id="push" onclick="return push()" value="プッシュ通知を送信">
        
    </body>
    </x-app-layout>
</html>