@extends('layout')
  @section('content')
  <div class="syoukaijou-top">
<div class="syoukaijou-daimei">紹介状作成</div>
<div class="returne">戻る</div>
</div>
<div class="syoukaijou">
<div class="syoukaijou-title">
  <div>タイトル入力（必須）</div>
  <div><form action="">aaa</form></div>
</div>
<div class="syoukaijou-main">
  <div>本文（必須）</div>
  <div class=""><form action="">aaa</form></div>
</div>
<div class="syoukaijou-pic">
  <div class="syoukaijou-pic-button">写真を追加する</div>
  <div>※写真は必ず一枚必須</div>
  <div class="syoukaijou-pics">
    <div class="syoukaijou-pic1"></div>
    <div class="syoukaijou-pic2"></div>
    <div class="syoukaijou-pic3"></div>
    <div class="syoukaijou-pic4"></div>
  </div>
</div>
<div class="syoukaijou-jyanru-area">
  <div class="syoukaijou-jyanru">
    <div class="syoukaijou-jyanru-title">ジャンル</div>
    <div class="">tag</div>
  </div>
  <div class="syoukaijou-area"></div>
  <div class="syoukaijou-area-title">エリア</div>
    <div class="">tag</div>
</div>
<div class="syoukaijou-supot">
  <div class="syoukaijou-supot-title">スポット情報</div>
  <div class="syoukaijou-supot-name">スポット名、店名（必須）</div>
  <div class="syoukaijou-supot-name-form"><form action="">aaa</form></div>
  <div class="syoukaijou-supot-zyusyo">住所（任意）</div>
  <div class="syoukaijou-supot-zyusyo-form"><form action="">aaa</form></div>
  <div class="syoukaijou-supot-url">URL（任意）</div>
  <div class="syoukaijou-supot-url-form"><form action="">aaa</form></div>
</div>
<div class="syoukaijou-bottom">
  <div class="returne">戻る</div>
  <div class="btn">投稿する</div>
</div>
</div>
  @endsection
