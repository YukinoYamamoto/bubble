<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('/css/main.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="{{ asset('/js/like.js') }}"></script>

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

    <div class="my-page">
        <form action="/post" method="get">
        <button type="submit" id="my-btn">投稿する</button>
        </form>

        <body class="font-sans antialiased">
        <!--<div class="min-h-screen bg-gray-100">-->
        <div class="my-area">
            <p>今日のbubble</p>

            @forelse($texts as $text)
            <div class="mt_box">
                <p>○{{ $text->created_at }}○{{ $text->text }}</p>
            </div>
            
            <div class="post-flex">
            <button onclick=>いいね</button>
            @if(auth()->user())
                @if(isset($text->like_posts[0]))
                    <a class="toggle_wish" text_id="{{ $text->id }}" like_post="1">
                        <i class="fas fa-heart"></i>
                    </a>
                @else
                    <a class="toggle_wish" text_id="{{ $text->id }}" like_post="0">
                        <i class="far fa-heart"></i>
                    </a>
                @endif
            @endif
            </div>
            @empty
                <td>no post!</td>
            @endforelse
        </div>

@include('bubbleshare.footer')    

</body>
</html>