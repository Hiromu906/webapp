<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Events List</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="css/style.css">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ダッシュボード') }}
        </h2>
    </head>
    </x-slot>
    <body>
    <div class="wrapper">
            <section class="main-area">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1>ようこそ</h1><br>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            
            <aside class="sub-area">
            <div class="sidebar">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white p-4">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <ul>
                                <li><a class="side-list-title" href='/dashboard/today'>本日の予定</a></li>
                                <li><a class="side-list-title" href='/dashboard/month'>月次カレンダー表示</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </aside>
        </div>
    </body>
</x-app-layout>
