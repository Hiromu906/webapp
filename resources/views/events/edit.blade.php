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
                            <form action="/events/{{ $event->id }}" method="POST">
                                <ul>
                                @csrf
                                @method('PUT')
                                <li>
                                <div class='title'>
                                    <label for="title">タイトル</label>
                                    <input type="text" name="event[title]" value="{{ $event->title }}">
                                </div>
                                </li>
                                <div class='body'>
                                    <li>
                                        <label for="start_time">予定開始時間</label>
                                        <input type="datetime-local" name="event[start_time]" value="{{ $event->start_time->format('Y-m-d\TH:i') }}" /><br>
                                    </li>
                                    <li>
                                        <label for="end_time">予定終了時間</label>
                                        <input type='datetime-local' name="event[end_time]" value="{{ $event->end_time->format('Y-m-d\TH:i') }}" /><br>
                                    </li>
                                    <li>
                                        <label for="location">場所</label>
                                        <input type="text" name="event[location]" value="{{ $event->location }}"/></br>
                                    </li>
                                    <li>
                                    <label for="description">詳細情報　 メモ</label>
                                    <textarea name="event[description]" cols='30' rows='10'>{{ $event->description }}</textarea><br>
                                    </li>
                                    <li>
                                    <label for="send_at">通知日</label>
                                    <input type="datetime-local" name="event[send_at]" value="{{ $event->send_at->format('Y-m-d\TH:i') }}" /><br>
                                    </li>
                                    <li>
                                    <label for="is_release">公開状況</label>
                                    <select name="event[is_release]">
                                        <option value="1" {{ $event->is_release ? 'selected' : '' }}>公開</option>
                                        <option value="0" {{ !$event->is_release ? 'selected' : '' }}>非公開</option>
                                    </select>
                                    </li>
                                </div>
                                <div class="submit-footer">
                                    <div class="submit">
                                        <input type="submit" value="保存" class="submitButton">
                                    </div>
                                    <div class="backButton">
                                        <a href="/events/{{ $event->id }}">戻る</a>
                                    </div>
                                </div>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    </body>
</html>