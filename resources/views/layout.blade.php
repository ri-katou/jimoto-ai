<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>地元あい</title>
    <link rel="apple-touch-icon" type="image/png" href="/apple-touch-icon-180x180.png">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header class="header-fixed">
        <div class="header-container">
            <div class="logo">
                <a href="{{route('home')}}">
                <img src="/image/jimotoai-logo.png" alt="logo"></a>
            </div>
            @if (Auth::check())
                <div class="header-login">
                    <div class="header-mypage">
                        <div class="header-profile-icon">
                            <img src="" alt="myimage">
                        </div>
                        <a href="{{ route('profile') }}" class="link">マイページへ</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" value="ログアウト" class="link">
                    </form>
                    <div class="header-btn">
                        <a class="btn-orange" href="#">紹介状の作成</a><br>
                        <a class="btn-green" href="#">紹介状の発見</a>
                    </div>
                </div>
            @else
                <div class="header-not-login">
                    <a class="btn-orange" href="{{ route('register') }}">新規登録</a><br>
                    <a class="btn-green" href="{{ route('login') }}">ログイン</a>
                </div>
            @endif


        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
