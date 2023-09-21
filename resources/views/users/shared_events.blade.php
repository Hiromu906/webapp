<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Events List</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="../css/style.css">
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
                        <h1>共有されている予定一覧</h1>
                        @if($sharedEvents->isNotEmpty())
                            <div class='sharedEvents'>
                                @foreach($sharedEvents as $sharedEvent)
                                <div class='event'>
                                    <h2 class='title'>
                                    <a href="/users/sharedEvents/{{ $sharedEvent->id }}">{{ $sharedEvent->title }}</a>
                                    </h2>
                                    <p class='start_time'>{{ $sharedEvent->start_time }}</p>
                                </div>
                                <br>
                                @endforeach
                                <div class="footer">
                                    <a href="/users">戻る</a>
                                </div>
                            </div>
                        @else
                            <p>共有されている予定はありません</p>
                            <div class="footer">
                                <a href="/users">戻る</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>