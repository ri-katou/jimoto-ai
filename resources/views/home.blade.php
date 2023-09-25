@extends('layout')
@section('content')
<div class="home">
  <div class="syoukaijou-header">
    <div class="home-icon-right">
      <div class="profile-icon"></div>
      <div class="icon-prof"><a href="">プロフィール画面へ</a></div>
    </div>
    <div class="home-icon-left">
      <div class="icon-space">
        <img src="/image/letter.svg" alt="" class="letter-svg">
        <img src="/image/magnifying-glass.svg" alt="" class="glass-svg">
        <div class="serch-syoukaijou">
          紹介状を見つける
        </div>
      </div>
    </div>
  </div>
  <div class="syoukaijyou-hyouji">
    <div class="home-body midasi">
      自分の投稿した紹介状
    </div>
    <div class="card-margin">
      <div class="syoukaijou-card">
        <div class="syou"></div>
        <div class="syou"></div>
        <div class="syou"></div>
      </div>
    </div>
    <div class="mottomiru"><a href="">もっと見る</a></div>
  </div>
  <div class="syoukaijyou-hyouji">
    <div class="home-body midasi">
      行ったよ
    </div>
    <div class="card-margin">
      <div class="syoukaijou-card">
        <div class="syou"></div>
        <div class="syou"></div>
        <div class="syou"></div>
      </div>
    </div>
    <div class="mottomiru"><a href="">もっと見る</a></div>
  </div>
  <div class="syoukaijyou-hyouji">
    <div class="home-body midasi">
      行ってみたい
    </div>
    <div class="card-margin">
      <div class="syoukaijou-card">
        <div class="syou"></div>
        <div class="syou"></div>
        <div class="syou"></div>
      </div>
    </div>
    <div class="mottomiru"><a href="">もっと見る</a></div>
  </div>
  <div class="toukou">紹介状作成</div>
</div>


@endsection