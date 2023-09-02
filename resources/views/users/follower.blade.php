<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>フォロワー一覧</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    </x-slot>
    <body>
        <h1>フォロワー一覧</h1>

        <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>ユーザー名</th>
            <th>アクション</th>
        </tr>
        </thead>
        <tbody>
         @foreach($friend as $follower)
            <tr>
                <td>{{ $follower->id }}</td>
                <td>{{ $follower->username }}</td>
                <td>
                
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </body>
    </x-app-layout>
</html>