<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>フォロワー一覧</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    </x-slot>
    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="follower-list">
                            <h1>フォロワー一覧</h1><br>
                            @foreach($followers as $follower)
                            <a href="/users/followers/{{$follower->id}}">{{ $follower->name }}</a><br>
                            @endforeach
                            <div class="footer">
                                <br><a href="/users">戻る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>