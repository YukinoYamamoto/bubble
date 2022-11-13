<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bubbleshare</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('/css/main.css') }}" rel="stylesheet">
</head>
    
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    </x-app-layout>

    <div class="my-page">
        <form action="/post" method="get">
        <button type="submit" id="my-btn"> 新 規 投 稿 す る</button>
        </form>
        <br>
        <body class="font-sans antialiased">
        <!--<div class="min-h-screen bg-gray-100">-->

        <div class="my-area">
            <p>My bubble</p><br>
            @forelse($texts as $text)
            {{ csrf_field() }}
            <div class="mt_box">
                <p>○{{ $text->created_at }}○{{ $text->text }}</p>

                <form action="{{ route('detail',['id'=>$text->id]) }}" method="post">
                {{ csrf_field() }}
                    <dt class="all-btn"><button class="all-btn" type="button"><input type="submit"  value="詳 細"></button></dt>
                </form>
                <br><br><br>
            </div>
            @empty
            <td>no post!</td>
            @endforelse
        </div>
        <br>
        <div class="my-good">
            <a href="{{ url('likelist') }}">いいね!したbubbleを見る</a>
            <br>
        </div>

    <br>
</div>
    @include('bubbleshare.footer')

</body>
</html>