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

<body>
    <header>
        <h1 class="header1">Bubble share</h1>
    </header>

    <main>
        <div class="bubbleone-img">
            <img class="img1" src="/img/bubbleone.png">
            <img class="img2" src="/img/bubbleone.png">
            <img class="img3" src="/img/bubbleone.png">
            <img class="img4" src="/img/bubbleone.png">
            <img class="img5" src="/img/bubbleone.png">
        </div>
        <div class="logbtn">
            <form action="{{ route('mypage') }}" method="post">
            <!--<form method="POST" action="/login">-->
        
            <button type="submit" id="btn">ログイン</button>
                <!--<button onclick="location.href='./login.blade.php'">ログイン</button>-->
            </form>
        </div>
    </main>

    @include('bubbleshare.footer')
</body>