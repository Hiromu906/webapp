<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Events List</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="../../css/style.css">
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
                        <div class="content">
                        <form action="/events/{{$event->id}}/share" method="POST">
                            <ul>
                            @csrf
                            <li>
                            <label for="shareUser">共有相手：</label>
                            </li>
                            <li>
                            <select name="shareUser" id="shareUser">
                                <option value="">選択してください</option>
                                @foreach($receivers as $receiver)
                                    <option value="{{ $receiver->id }}">{{ $receiver->name }}</option>
                                @endforeach
                            </select>
                            </li>
                            <br>
                            <li>
                            <h1>共有予定</h1>
                            </li>
                            <div class='content__title'>
                            <li>
                                <label for="title">タイトル</label>
                                <a>{{ $event->title }}</a><br>
                            </li>
                            </div>
                            <div class='content__body'>
                            <li>
                                <label for="start_time">予定開始時間</label>
                                <a>{{ $event->start_time}}</a><br>
                            </li>
                            <li>
                                <label for="end_time">予定終了時間</label>
                                <a>{{ $event->end_time->format('Y-m-d\TH:i') }}</a><br>
                            </li>
                            <li>
                                <label for="location">場所</label>
                                <a>{{ $event->location }}</a></br>
                            </li>
                            <li>
                                <label for="description">詳細情報メモ</label>
                                <a>{{ $event->description }}</a><br><br>
                            </li>
                            <li>
                                <label for="send_at">通知日</label>
                                <a>{{ $event->send_at}}</a><br>
                            </li>
                                <input type="hidden" name="event[is_template]" value="0"/>
                            </div>
                            @if(session('success'))
                                <div class="alert alert-danger">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="submit-footer">
                                <div>
                                    <input type="submit" value="保存" class="submitButton">
                                </div>
                                <div class="footer">
                                    <a href="/events">戻る</a>
                                </div>
                            </div>
                            </ul>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>