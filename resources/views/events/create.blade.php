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
        <form method="POST" action="/events/create">
            <label for="template">テンプレート選択：</label>
            <select name="template" id="template">
                <option value="">選択してください</option>
                @foreach($templates as $template)
                    <option value="{{ $template->id }}">{{ $template->title }}</option>
                @endforeach
            </select>
            @csrf
            <button type="submit" value="id">テンプレート適用</button>
        </form>
        <form action="/events" method="POST">
            @csrf
        
                <div class="title">
                    <label for="title">予定タイトル</label>
                    <input type="text" name="event[title]" placeholder="タイトル" value="{{ old('event.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('event.title') }}</p>
                </div>
                <div class="body">
                    <label for="start_time">予定開始時間</label>
                    <input type="datetime-local" name="event[start_time]" value="{{ old('event.start_time', date('Y-m-d') . 'T09:00')  }}"/><br>
                    <p class="start_time__error" style="color:red">{{ $errors->first('event.start_time') }}</p>
                    <label for="end_time">予定終了時間</label>
                    <input type="datetime-local" name="event[end_time]" value="{{ old('event.end_time', date('Y-m-d') . 'T09:00')  }}"/><br>
                    <p class="end_time__error" style="color:red">{{ $errors->first('event.end_time') }}</p>
                    <label for="location">場所</label>
                    <input type="text" name="event[location]" placeholder="場所" value="{{ old('event.location') }} "/></br>
                    <label for="description">詳細情報・メモ</label>
                    <textarea name="event[description]" cols='30' rows='10' placeholder="詳細情報" value="{{ old('event.description') }}"></textarea><br>
                    <label for="send_at">通知日</label>
                    <input type="datetime-local" name="event[send_at]"/><br>
                    <label for="is_release">公開選択</label>
                    <select name="event[is_release]">
                        <option value="1">公開</option>
                        <option value="0">非公開</option>
                    </select><br>
                    <label for"is_template">テンプレート保存</label>
                    <select name="event[is_template]">
                        <option value="0">保存しない</option>
                        <option value="1">保存する</option>
                    </select>
                </div>
            
            <input type="submit" value="作成"/>
        </form>
        <div class="footer">
            <a href="/events">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>