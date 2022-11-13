<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('/css/main.css') }}" rel="stylesheet">
    <title>bubbleshare</title>
</head>
<body>
    <div class="pass-page">
        <h1>新しいパスワードを入力してください</h1>
        <div class="pass-area">
            <div class="pass-link">
            <form action="/login" method="post" class="pass-form">
            {{ csrf_field() }}
                <dl>
                    @if ($errors->has('email'))
                    <p>{{$errors->first('email')}}</p>
                    @endif
                    <dd><input type="email" neme="email" placeholder="メールアドレス"></dd>

                    @if ($errors->has('password'))
                    <p>{{$errors->first('password')}}</p>
                    @endif
                    <dd><input type="password" name="pass" placeholder="新しいパスワード"></dd>

                    @if ($errors->has('password'))
                    <p>{{$errors->first('password')}}</p>
                    @endif
                    <dd><input type="password" name="pass2" placeholder="新しいパスワードを再入力"></dd>

                    <dd><button type="submit" id="settei-btn">設定する</button></dd>
                </dl>
            </form>
            <a href="/login">戻る</a>
            </div>
        </div>
    </div>

    @include('bubbleshare.footer')
</body>
</html>