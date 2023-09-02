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
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/events/{{ $event->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <lavel for="title">タイトル</lavel>
                <input type="text" name="event[title]" value="{{ $event->title }}">
            </div>
            <div class='content__body'>
                <label for="start_time">予定開始時間</label>
                <input type="datetime-local" name="event[start_time]" value="{{ $event->start_time->format('Y-m-d\TH:i') }}" /><br>

                <label for="end_time">予定終了時間</label>
                <input type='datetime-local' name="event[end_time]" value="{{ $event->end_time->format('Y-m-d\TH:i') }}" /><br>
                
                <label for="location">場所</label>
                <input type="text" name="event[location]" value="{{ $event->location }}"/></br>
                
                <label for="description">詳細情報・メモ</label>
                <textarea name="event[description]" cols='30' rows='10'>{{ $event->description }}</textarea><br>
                
                <label for="send_at">通知日</label>
                <input type="datetime-local" name="event[send_at]" value="{{ $event->send_at->format('Y-m-d\TH:i') }}" /><br>
                
                <label for="is_release">公開状況</label>
                <select name="event[is_release]">
                    <option value="1" {{ $event->is_release ? 'selected' : '' }}>公開</option>
                    <option value="0" {{ !$event->is_release ? 'selected' : '' }}>非公開</option>
                </select>
                
            </div>
            <input type="submit" value="保存">
            <div class="footer">
                <a href="/events/{{ $event->id }}">戻る</a>
            </div>
        </form>
    </div>
    </x-app-layout>
    </body>
</html>