<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <title>Event</title>
    </head>
    </x-slot>
    <body>
        <h1>新規予定作成</h1>
        <form action="/events" method="POST">
            @csrf
            <div class="title">
                <label for="title">予定タイトル</label>
                <input type="text" name="event[title]" placeholder="タイトル" value="{{ old('event.title') }}"/>
            </div>
            <div class="body">
                <label for="start_time">予定開始時間</label>
                <input type="datetime-local" name="event[start_time]" value="{{ old('event.start_time') }}"/><br>
                <label for="end_time">予定終了時間</label>
                <input type="datetime-local" name="event[end_time]" value="{{ old('event.end_time') }}"/><br>
                <label for="location">場所</label>
                <input type="text" name="event[location]" placeholder="場所"/></br>
                <label for="description">詳細情報・メモ</label>
                <textarea name="event[description]" cols='30' rows='10' placeholder="詳細情報"></textarea><br>
                <label for="send_at">通知日</label>
                <input type="datetime-local" name="event[send_at]"/><br>
                <label for="is_release">公開選択</label>
                <select name="event[is_release]">
                    <option value="1">公開</option>
                    <option value="0">非公開</option>
                </select>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/events">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>