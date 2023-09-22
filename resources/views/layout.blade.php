<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>地元あい</title>
  {{-- <link rel="icon" href="img/favicon.ico"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <div class="rapper">
  <header>
    <div class="logo"><img src="/image/jimotoai-logo.png" alt="logo"></div>
    <div><a href="register/">新規登録</a></div>
    <div class="btn-orange"><button>ログイン</button></div>
    
  </header>
  <main>
    @yield('content')
  </main>
</div>
</body>

</html>