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
    <div class="regi-page">
        <div class="toplink">
            <a href="/">Bubble share</a>
        </div>
        <form action="/register" method="post" class="regi-form">
        {{ csrf_field() }}
            <dl>
                @if ($errors->has('name'))
                <p>{{$errors->first('name')}}</p>
                @endif
                <dd><input type="text" name="name" placeholder="ユーザ名"></dd>

                @if ($errors->has('email'))
                <p>{{$errors->first('email')}}</p>
                @endif
                <dd><input type="email" name="email" placeholder="メールアドレス"></dd>

                @if ($errors->has('password'))
                <p>{{$errors->first('password')}}</p>
                @endif
                <dd><input type="password" name="pass" placeholder="パスワード"></dd>

                <dd><button type="submit" id="regi-btn">登　録</button></dd>
            </dl>
        </form>
    </div>

@include('bubbleshare.footer')

</body>
</html>