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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
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
            <div class="hamberger-menu"><i class="fas fa-bars" style="color: #424242;"></i></div>
            <nav class="header-login gNav ">
                <div class="header-mypage">
                    <div class="header-profile-icon">
                        <img src="{{ isset(\App\User_detail::select('icon_image')->where('user_id',Auth::id())->first()->icon_image )? \App\User_detail::select('icon_image')->where('user_id',Auth::id())->first()->icon_image : 'https://jimotoai2023.s3.ap-northeast-1.amazonaws.com/jimotoaiprofile/cgj35n6IhyLz3mbaMJ3kt0EfsRtP1yuIJhDDJ9XP.jpg'}}" alt="myimage" class="profile-icon-img">
                    </div>
                    <a href="{{ route('home') }}" class="link">マイページへ</a>
                </div>
                <div class="header-logout">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class="header-logout-icon">
                        <img src="/image/logout.png" alt="myimage" class="logout-icon">
                    </div>
                    <input type="submit" value="ログアウト" class="link">
                </form>
                </div>
                <div class="header-btn">
                    <a class="btn-orange header-create-btn" href="{{route('syoukaijou.create')}}">紹介状の作成</a>
                    <a class="btn-green header-serch-btn" href="{{route('spot.search')}}">紹介状の発見</a>
                </div>
            </nav>
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
    <script src="../../js/script.js"></script>
    @yield('script')
</body>

</html>