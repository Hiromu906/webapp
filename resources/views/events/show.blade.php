<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Events</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="../css/style.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予定管理') }}
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
                                <p class="info-item">詳細情報:{{ $event->description }}</p>
                                <p class="info-item">開始時間:{{ $event->start_time }}</p>
                                <p class="info-item">終了時間:{{ $event->end_time }}</p>
                                <p class="info-item">場所    :{{ $event->location }}</p>
                                <p class="info-item">通知日  :{{ $event->send_at }}</p>
                                <p class="info-item">公開状況:{{ $event->is_release == 1 ? '公開' : '非公開' }}</p>
                            </div>
                        </div>
                        <div class="edit-footer">
                            <div class="edit">
                                <a href="/events/{{ $event->id }}/edit">編集</a>
                            </div>
                            <div class="footer">
                                <a href="/events">戻る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>