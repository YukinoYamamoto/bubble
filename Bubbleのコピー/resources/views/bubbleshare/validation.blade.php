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
    <div class="toplink">
        <a href="/">Bubble share</a>
    </div>
    <div class="vali-page">
        <dl><dt class="confi">ユーザ名</dt>
        <dd>
          <div class="">{!! htmlspecialchars($name) !!}</div>
          <input name="name" value="{{$name}}" type="hidden">
        </dd>
        </dl>
        <dl><dt class="confi">メールアドレス</dt>
        <dd>
          <div class="">{!! htmlspecialchars($email) !!}</div>
          <input name="email" value="{{$email}}" type="hidden">
        </dd>
        </dl>
        <dl><dt class="confi">パスワード</dt>
        <dd>
            <div class="">{!! htmlspecialchars($password) !!}</div>
            <input name="password" value="{{$password}}" type="hidden">
        </dd>
        </dl>
        <dd><button type="submit" id="login-btn">ログイン</button></dd>
    </div>

@include('bubbleshare.footer')

</body>
</html>