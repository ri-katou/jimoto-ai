<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>地元あい</title>
    <link rel="apple-touch-icon" type="image/png" href="/apple-touch-icon-180x180.png">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/css/style.css">
    <style>
        
    </style>

</head>
<body>
  <div class="error-hand-back-image">
  <div class="error-hand-message">
    <p>404</p>
    <p>お探しのページが見つかりません。</p>
  </div>
  <div class="back-home"><a class="link" href="{{route('home')}}">ホームへ戻る</a></div>
  </div>
</body>
</html>