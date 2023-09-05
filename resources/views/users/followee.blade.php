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
        <h1>フォロー一覧</h1>
        @foreach($followees as $followee)
           <a href="/users/followees/{{$followee->id}}">{{ $followee->name }}</a><br>
        @endforeach
        </tbody>
        </table>
        <div class="footer">
            <a href="/users">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>