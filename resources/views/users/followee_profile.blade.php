<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ユーザー表示</title>
        <link rel="stylesheet" href="../../css/style.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ユーザー') }}
        </h2>
    </head>
    </x-slot>
   <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="followee-profle">
                            <h1>公開中の予定一覧</h1><br>
                            @if(isset($event))
                                @foreach($event as $eventItem)
                                    <div>予定タイトル:{{ $eventItem->title }}</div>
                                    <div>予定開始日時:{{ $date }}</div>
                                @endforeach
                            @else
                                <p> {{ $message }} </p>
                            @endif
                            <br><h1>このユーザーと共有中の予定</h1><br>
                            @if(isset($shareEvents))
                                @foreach($shareEvents as $shareEvent)
                                    <div>予定タイトル:{{ $shareEvent->title }}</div>
                                    <div>予定日時:{{ $date }}</div>
                                @endforeach
                            @endif
                            @if(isset($shareEvents2))
                                @foreach($shareEvents2 as $shareEvent2)
                                    <br>
                                    <div>予定タイトル:{{ $shareEvent2->title }}</div>
                                    <div>予定日時:{{ $date }}</div>
                                @endforeach
                            @endif
                            @if(!isset($shareEvents) && !isset($shareEvents2))
                                <p>共有中の予定はありません</p>
                            @endif
                            <br>
                            <div class="footer">
                                <a href="/users/followees">戻る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>