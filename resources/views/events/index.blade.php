<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Events List</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-sidebar.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予定管理') }}
        </h2>
    </head>
    </x-slot>
    <body>
        <div class="wrapper">
            <section class="main-area">
            <div class="py-12">
                <div class="max-w-75 mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1>予定一覧</h1><br>
                            <div class='events'>
                                @foreach($events as $event)
                                <div class='event'>
                                    <h2>
                                        <a href="/events/{{ $event->id }}">{{ $event->title }}</a>
                                    </h2>
                                    <p class='body'>{{ $event->body }}</p>
                                    <p class='start_time'>開始日時:{{ $event->start_time }}</p><br>
                                    <div class="event-footer">
                                        <div class="shareButton">
                                            <button type="button" onclick="location.href='/events/{{ $event->id }}/share'">共有</button>
                                        </div>
                                        <form action="/events/{{ $event->id }}" id="form_{{ $event->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="deleteButton">
                                                <button type="button" onclick="deletePost({{ $event->id }})">削除</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            
            <aside class="sub-area">
            <div class="sidebar">
                <div class="max-w-xs mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white p-4">
                        
                            <ul>
                                <li><a class="side-list-title" href='/events/create'>新規予定作成</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </aside>
        </div>
    </body>
    </x-app-layout>
</html>