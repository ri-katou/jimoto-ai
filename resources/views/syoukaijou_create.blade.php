@extends('layout')
  @section('content')
  <div class="syoukaijou_create">
  <div class="syoukaijou-top">
<div class="syoukaijou-daimei">紹介状作成</div>
<div class="returne">戻る</div>
</div>
<div class="syoukaijou">
<div class="syoukaijou-title">
  <form action="" method="post">
  <div class="syoukaijou-title-daimei">タイトル入力（必須）</div>
  <div><textarea name="title" id="" cols="80" rows="1"></textarea></div>
</div>
<div class="syoukaijou-main">
  <div class="syoukaijou-honbun">本文（必須）</div>
  <div class=""><textarea name="main" id="" cols="80" rows="20"></textarea></div>
</div>
<div class="syoukaijou-pic">
  <div class="syoukaijou-pic-button">写真を追加する</div>
  <div>※写真は必ず一枚必須</div>
  <div class="syoukaijou-pics">
    <div class="syoukaijou-pic1"><img src="" alt=""></div>
    <div class="syoukaijou-pic2"><img src="" alt=""></div>
    <div class="syoukaijou-pic3"><img src="" alt=""></div>
    <div class="syoukaijou-pic4"><img src="" alt=""></div>
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
  <div class="syoukaijou-supot-name-form"><textarea name="" id="" cols="80" rows="1"></textarea></div>
  <div class="syoukaijou-supot-zyusyo">住所（任意）</div>
  <div class="syoukaijou-supot-zyusyo-form"><textarea name="zyusyo" id="" cols="80" rows="1"></textarea></div>
  <div class="syoukaijou-supot-url">URL（任意）</div>
  <div class="syoukaijou-supot-url-form"><textarea name="url" id="" cols="80" rows="1"></textarea></div>
</div>
<div class="syoukaijou-bottom">
  <div class="returne">戻る</div>
  <div class="btn"><input type="submit" value="投稿する"></div>
  </form>
</div>
</div>
</div>
  @endsection
