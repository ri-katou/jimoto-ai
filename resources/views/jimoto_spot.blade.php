@extends('layout')
  @section('content')

<div class="jimoto-search-top">
  <div class="jimoto-search">
<form action="" method="get">
 <input type="search" name="search" placeholder="キーワードを入力" size="40">
 <input type="image" src="/image/glass.svg" width="30" height="30" alt="検索" value="検索する">
</form>
</div>
<select name="example">
<option>昇順</option>
<option>降順</option>
</select>
</div>

<div class="janru-area-search">
<div class="janru-search"><a class="btn-gray" href=#>エリアを指定して探す</a></div>
<div class="janru-search"><a class="btn-gray" href=#>ジャンルを指定して探す</a></div>
<div class="map-search"><a class="btn-gray" href=#>マップから探す</a></div>
</div>




  <div class="syoukaijou-sam">
    <div class="preview-syoukaijou-top-sam">
      <div class="sum-top">
        <div class="syoukaijou-day-sam">日付</div>
        <div class="syoukaijou-title-sam">タイトル</div>
        </div>
        <div class="janru-area-sam">
          <div class="janru-tag"> ジャンル：<div class="jyanru-sub">ラーメン</div></div>
          <div class="area-tag"> エリア：<div class="area-sub">渋川</div></div>
        </div>
      </div>
        <div class="preview-main-sam">
        <div class="preview-pics-sam">
          <div class="preview-pic1-sam"><img id="gazo" onclick="changeIMG()" src="/image/daruma.jpg"
   width="100%" height="100%" border="0" alt=""></div>
          <div class="preview-pics-sub">
            <div class="preview-pic2-sam"></div>
            <div class="preview-pic3-sam"></div>
            <div class="preview-pic4-sam"></div>
          </div>
        </div>
        <div class="preview-honbun">
          <div class="honbun-sum">本文aaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
          <div class="ittemitai"></div>
         <div class="ittayo"></div>
        </div>
      </div>
    </div>


    @endsection