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

<div class="con-page">
    <div class="con-area">
        <p>今日のbubble</p>
        <div class="post-text">

            <form action="{{ route('newpost') }}" method="post">
            {{ csrf_field() }}
            <dl>
                <dt> bubble内容</dt>
                <dd>          
                    <div class="">{!! htmlspecialchars($text) !!}</div>
                    <input name="text" value="{{$text}}" type="hidden">
                </dd>
            </dl>
            <div class="con-btns">
                <a><button type="button" class="confi-btn" onclick=history.back()>戻 る</button></a>
                <button type="submit" class="confi-btn2">投 稿</button>
            </div>
            
            </form>

        </div>
    </div>
</div>
    
@include('bubbleshare.footer')

</body>
</html>