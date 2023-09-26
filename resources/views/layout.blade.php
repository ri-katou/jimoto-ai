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
            <div class="header-container">
                <div class="logo"><img src="/image/jimotoai-logo.png" alt="logo"></div>
                {{-- @if (Auth::check()){ --}}
                <div class="header-login">
                    <div class="header-login-profile">
                        <div class="header-profile-myimag"><img src="" alt="myimage"></div>
                        <a href="" class="link-green">マイページ</a>
                    </div>
                    <div class="header-btn">
                        <a class="btn-orange header-create-btn" href=#>紹介状の作成</a>
                        <a class="btn-green header-serch-btn" href=#>紹介状の発見</a>
                    </div>
                </div>
                {{-- } @else {
                    <div class="header-not-login">
                        <a class="btn-orange" href=#>新規登録</a>
                        <a class="btn-green" href=#>ログイン</a>
                      </div>
                } --}}
                {{-- @endif --}}

            </div>
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="footer">
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
