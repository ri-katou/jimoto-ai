<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">

    <title>地元あい</title>
</head>

<body>
    <div class="rapper">
        <main>
            <div class="page-top">
                <div class="top-logo"><img src="/image/jimotoai-logo.png" alt="logo"></div>
                <div class="top-loginbtn-container container">
                    <label class="login-btn"><a href="{{ route('login') }}">ログイン</a></label>
                </div>
                <div class="logo-sub">jimoto ai</div>
                <div class="top-vertical-message vertical yu-sei">
                    <p>あなたが知ってる地元のお店やグルメ</p>
                    <p>あなただけが知ってる地元の景色</p>
                    <p>紹介してみませんか？</p>
                </div>
                <div class="top-pics">
                    <div class="top-pic-left"><img src="/image/udon.jpg" alt="udon"></div>
                    <div class="top-pic-right"><img src="/image/oze.jpg" alt="oze"></div>
                </div>
                <div class="top-icon">
                    <div class="top-mori-icon"><img src="/image/forest.svg" alt="forest"></div>
                </div>
                <div class="pics">
                    <div class="top-pic-middle"><img src="/image/burige.jpg" alt="burige"></div>
                </div>
                <div class="page-middle">
                    <div class="top-middle-comment yusei">地元ですごい景色が撮れた！みんなにも見てほしい。
                        そんな地元の素晴らしさを発信できるサイトです。</div>
                </div>
            </div>

            <div class="top-icon">
                <div class="middle-mori-icon"><img src="/image/forest.svg" alt="forest"></div>
            </div>
            <div class="page-bottom">
                <div class="top-pics">
                    <div class="top-pic4">
                        <img src="/image/niwa.jpg" alt="niwa">
                        <div class="top-pic5">
                            <img src="/image/rever.jpg" alt="rever">
                        </div>
                        <div class="top-pic6">
                            <img src="/image/lion.jpg" alt="lion">
                        </div>
                        <div class="top-pic7">
                            <img src="/image/stone.jpg" alt="stone">
                        </div>
                        <div class="top-pic8">
                            <img src="/image/daruma.jpg" alt="daruma">
                        </div>
                    </div>
                </div>
                <div class="yusei">
                    <div class="top-bottom">
                        <div class="top-bottom-comment">
                            お店やグルメ、景色など地元の素晴らしさは無限大！<br>

                        </div>
                        <div class="top-bottom-right"> みんなで地元の素晴らしさを伝え合おう！！
                            <div class="top-kaiin">会員登録はこちら↓</div>
                            <div class="top-kaiin-btn">
                                <a class="btn-orange" href="{{ route('register') }}">会員登録</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>
