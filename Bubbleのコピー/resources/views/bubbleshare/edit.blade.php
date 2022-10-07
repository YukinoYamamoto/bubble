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
    <div class="edit-page">
        
            <div class="toplink">
                <a href="/">Bubble share</a>
            </div>
            <div class="edit-area">
            <form action="/editcomp" method="post">
            {{ csrf_field() }}

            <h2>編集するbubble</h2>
                @foreach($texts as $text)
                
                <div>
                <dd><input type="text" id="text" name="text" value="{{ $text->text }}"  class="mt_box"></dd>
                <input type="hidden" value="{{ $text->id }}" name="id">
                </div>
            
                @endforeach
                <div class="edit-btns">
                <button type="button" class="edit-back" onclick=history.back()>戻 る</button>
                <button type="submit" id="edi-btn">保 存</button>
                </div>
            </form><br><br>
        </div>
    </div>

    @include('bubbleshare.footer')
    
</body>
</html>