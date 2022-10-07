<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('/css/main.css') }}" rel="stylesheet">
    <link href="{{asset('/js/like.js')}}">
    <title>bubbleshare</title>
</head>
<body>
    <div class="detail-wrap">
        <div class="toplink">
            <a href="/">Bubble share</a>
        </div>

        <div class="my-area">
            <p>bubbleの詳細</p>
            @foreach($texts as $text)

            <div class="mt_box">
                <p>{{ $text->text }}</p>
            </div>
            <div class="three-flex">
            <td>
                <form action="{{ route('edit',['id'=>$text->id]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="submit" class="edit" value="編 集" >
                    <input type="hidden" name="id" value="{{ $text->id }}">
                </form>
            </td>
            <td>
                <form action="{{ route('delete',['id'=>$text->id]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="submit" class="dele" value="削 除" onclick="return confirm('この投稿を削除しますか？')">
                    <input type="hidden" name="id" value="{{ $text->id }}">
                </form>
            </td>
            @endforeach
            <td>
                <form>
                    <button type="button" class="detail-back" onclick=history.back()>戻 る </button>
                    <input type="hidden" name="id" value="">
                </form>
            </td>
            </div><br><br>
    </div>
    @include('bubbleshare.footer')
    
</body>
</html>