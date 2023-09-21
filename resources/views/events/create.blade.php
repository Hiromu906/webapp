<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Event</title>
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
                            <form method="POST" action="/events/create" class="template">
                                <ul>
                                <li class="template">
                                <label for="template">テンプレート選択</label>
                                <select name="template" id="template">
                                <option value="">選択してください</option>
                                    @foreach($templates as $template)
                                        <option value="{{ $template->id }}">{{ $template->title }}</option>
                                    @endforeach
                                </select>
                                </li>
                                @csrf
                                <li>
                                <button type="submit" value="id" class="templateButton">テンプレート適用</button>
                                </li>
                            </form>
                            <form action="/events" method="POST" class="events">
                                @csrf
                                @php($templateData = session('templateData'))
                                @if($templateData != null && $templateData != "")
                                    <li class="title">
                                    <div class="title">
                                        <label for="title">予定タイトル</label>
                                            <input type="text" name="event[title]" placeholder="タイトル" value="{{ old('event.title', $templateData->title) }}"/>
                                            <p class="title__error" style="color:red">{{ $errors->first('event.title') }}</p>
                                    </div>
                                    </li>
                                    <div class="body">
                                    <li class="start_time">
                                        <label for="start_time">予定開始時間</label>
                                            <input type="datetime-local" name="event[start_time]" value="{{ old('event.start_time',$templateData->start_time)}}"/><br>
                                            <p class="start_time__error" style="color:red">{{ $errors->first('event.start_time') }}</p>
                                    </li>
                                    <li class="end_time">
                                        <label for="end_time">予定終了時間</label>
                                            <input type="datetime-local" name="event[end_time]" value="{{ old('event.end_time', $templateData->end_time)  }}"/><br>
                                            <p class="end_time__error" style="color:red">{{ $errors->first('event.end_time') }}</p>
                                    </li>
                                    <li class="location">
                                        <label for="location">場所</label>
                                            <input type="text" name="event[location]" placeholder="場所" value="{{ old('event.location',$templateData->location) }}"/><br>
                                    </li>
                                    <li class="description">
                                        <label for="description">詳細情報　 メモ</label>
                                            <textarea name="event[description]" cols='30' rows='10' placeholder="詳細情報" value="{{ old('event.description',$templateData->description) }}"></textarea><br>
                                    </li>
                                    <li class="send_at">
                                        <label for="send_at">通知日</label>
                                            <input type="datetime-local" name="event[send_at]" value="{{ old('event.send_at',$templateData->send_at)  }}"/><br>
                                    </li>
                                    <li class="is_release">
                                        <label for="is_release">公開選択</label>
                                            <select name="event[is_release]">
                                                <option value="1">公開</option>
                                                <option value="0">非公開</option>
                                            </select><br>
                                    </li>
                                        <input type="hidden" name="event[is_template]" value="0">
                                    </div><br>
                                    <li>
                                    <input type="submit" value="作成" class="submitButton"/>
                                    <a href="/events" class="backButton">戻る</a>
                                    </li>
                                @else
                                    <li class="title">
                                    <div class="title">
                                        <label for="title">予定タイトル</label>
                                            <input type="text" name="event[title]" placeholder="タイトル" value="{{ old('event.title') }}"/>
                                            <p class="title__error" style="color:red">{{ $errors->first('event.title') }}</p>
                                    </div>
                                    </li>
                                    <div class="body">
                                    <li class="start_time">
                                        <label for="start_time">予定開始時間</label>
                                            <input type="datetime-local" name="event[start_time]" value="{{ old('event.start_time', date('Y-m-d') . 'T09:00')  }}"/><br>
                                            <p class="start_time__error" style="color:red">{{ $errors->first('event.start_time') }}</p>
                                    </li>
                                    <li class="end_time">
                                        <label for="end_time">予定終了時間</label>
                                            <input type="datetime-local" name="event[end_time]" value="{{ old('event.end_time', date('Y-m-d') . 'T10:00')  }}"/><br>
                                            <p class="end_time__error" style="color:red">{{ $errors->first('event.end_time') }}</p>
                                    </li>
                                    <li class="location">
                                        <label for="location">場所</label>
                                            <input type="text" name="event[location]" placeholder="場所" value="{{ old('event.location') }}"/></br>
                                    </li>
                                    <li class="description">
                                        <label for="description">詳細情報　 メモ</label>
                                            <textarea name="event[description]" cols='30' rows='10' placeholder="詳細情報" value="{{ old('event.description') }}"></textarea><br>
                                    </li>
                                    <li class="send_at">
                                        <label for="send_at">通知日</label>
                                            <input type="datetime-local" name="event[send_at]" value="{{ old('event.start_time')}}"/><br>
                                    </li>
                                    <li class="is_release">
                                        <label for="is_release">公開選択</label>
                                            <select name="event[is_release]">
                                                <option value="1">公開</option>
                                                <option value="0">非公開</option>
                                            </select><br>
                                    </li>
                                    <li class="is_template">
                                        <label for="is_template">テンプレート保存</label>
                                            <select name="event[is_template]">
                                                <option value="0">保存しない</option>
                                                <option value="1">保存する</option>
                                            </select>
                                    </li>
                                    </div>
                                    <br><br>
                                    <li>
                                    <input type="submit" value="作成" class="submitButton"/>
                                    <a href="/events" class="backButton">戻る</a>
                                    </li>
                                    </div>
                                @endif
                            </ul>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>