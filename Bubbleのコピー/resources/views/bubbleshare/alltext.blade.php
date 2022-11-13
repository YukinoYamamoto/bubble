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
<div class="all-page">

<x-app-layout>
    <x-slot name="header">
    </x-slot>
</x-app-layout>

    <div class="all-wrap">
        <div class="itiran">
        
            @foreach($texts as $text)
            
            <div class="mt_box">
                <p>{{ $text->user_id }}○{{ $text->created_at }}○{{ $text->text }}</p>

                <!--<form action="{{ route('detail',['id'=>$text->id]) }}" method="post">
                {{ csrf_field() }}
                    <dt class="all-btn"><button class="all-btn" type="button" value="" >詳 細</button></dt>
                    <br><br>
                </form>
                -->
                <form action="{{ route('detail',['id'=>$text->id]) }}" method="post">
                {{ csrf_field() }}
                    <dt class="all-btn"><button class="all-btn" type="button"><input type="submit"  value="詳 細"></button></dt>
                </form>
                <br><br><br>
            </div>
            @endforeach
        </div>
    </div>

@include('bubbleshare.footer')

</body>
</html>