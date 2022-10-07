<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('/css/main.css') }}" rel="stylesheet">
    <title>bubbleshare</title>
</head>
<body>

<x-app-layout>
        <x-slot name="header">
        </x-slot>
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('mypage')" :active="request()->routeIs('dashboard')">
            {{ __('○　m y p a g e　○') }}
            </x-nav-link>
        </div>
    </x-app-layout>

<div class="post-page">
    <div class="post-area">
        <p>今日のbubble</p>
        <div class="post-text">

            <form action="/confirm" method="post">
            {{ csrf_field() }}
            <dl>
                    <dd><input type="text" name="text" value="{{ old('text') }}" class="pos-text"></dd>
                    <a><button type="button" class="confi-btn" onclick=history.back()>戻 る</button></a>
                    <button type="submit" id="pos-btn">確 認 す る</button>
                    <br><br>
            </dl>
            </form>
        </div>
    </div>
</div>

@include('bubbleshare.footer')

</body>
</html>