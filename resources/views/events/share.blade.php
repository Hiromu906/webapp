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
        <h1>予定共有</h1>
        
        
        <form action="/events/{{$event->id}}/share" method="POST">
            @csrf
            <label for="shareUser">共有相手選択：</label>
            <select name="shareUser" id="shareUser">
                <option value="">選択してください</option>
                @foreach($receivers as $receiver)
                    <option value="{{ $receiver->id }}">{{ $receiver->name }}</option>
                @endforeach
            </select>
            <br>
            <lavel for="sharedEvent">共有予定:</lavel>
            <div class='content__title'>
                <lavel for="title">タイトル</lavel>
                <a>{{ $event->title }}</a>
            </div>
            <div class='content__body'>
                <label for="start_time">予定開始時間</label>
                <a>{{ $event->start_time}}</a><br>

                <label for="end_time">予定終了時間</label>
                <a>{{ $event->end_time->format('Y-m-d\TH:i') }}</a><br>
                
                <label for="location">場所</label>
                <a>{{ $event->location }}</a></br>
                
                <label for="description">詳細情報・メモ</label>
                <a>{{ $event->description }}</a><br>
                
                <label for="send_at">通知日</label>
                <a>{{ $event->send_at}}</a><br>
                <input type="hidden" name="event[is_template]" value="0"/>
                
            </div>
            <input type="submit" value="保存">
            <div class="footer">
                <a href="/events">戻る</a>
            </div>
        </form>
            
    </body>
    </x-app-layout>
</html>