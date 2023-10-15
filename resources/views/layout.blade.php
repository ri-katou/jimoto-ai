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
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 500px;
            width: 90%;
        }

        #floating-panel {
            position: absolute;
            top: 10px;
            left: 35%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto', 'sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
    </style>

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
                    <a href="{{ route('home') }}" class="link">マイページへ</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="ログアウト" class="link">
                </form>
                <div class="header-btn">
                    <a class="btn-orange" href="{{route('syoukaijou.create')}}">紹介状の作成</a><br>
                    <a class="btn-green" href="{{route('spot.search')}}">紹介状の発見</a>
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
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>