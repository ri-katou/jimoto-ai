@extends('layout')
  @section('content')
    <div class="preview-top">
      <div class="preview-daimei">紹介状作成</div>
      <div>戻る</div>
    </div>
    <div class="preview-naiyou">この内容でよろしいですか？</div>
    <div class="syoukaijou">
      <div class="preview-syoukaijou-top">
        <div class="syoukaijou-day">日付</div>
        <div class="janru-area">
          <div class="jyanru"> ジャンル：</div><div class="jyanru-sub">ラーメン</div>
          <div class="area"> エリア：</div><div class="area-sub">渋川</div>
        </div>
      </div>
      <div class="syoukaijou-title">タイトル</div>
      <div class="preview-main">
        <div class="preview-pics">
          <div class="preview-pic1"><img id="gazo" onclick="changeIMG()" src="/images/daruma.jpg" width="320" height="240" border="0" alt=""></div>
          <div class="preview-pics-sub">
            <div class="preview-pic2"></div>
            <div class="preview-pic3"></div>
            <div class="preview-pic4"></div>
          </div>
        </div>
        <div class="preview-honbun">
          <div class="preview-spot">スポット名&emsp;<div class="spot-name"></div></div>
          <div class="honbun">本文</div>
         <div class="ittemitai"></div>
         <div class="ittayo"></div>
        </div>
        </div>
        <div class="preview-spot-info">
          <div class="spot-info">スポット情報</div>
          <table>
            <tr>
              <td height="30" width="100">スポット名</td>
              <td class="spot-name" height="30"></td>
            </tr>
            <tr>
              <td height="30">住所</td>
              <td class="spot-address" height="30"></td>
            </tr>
            <tr>
              <td height="30">URL</td>
              <td class="spot-url" height="30"></td>
            </tr>
          </table>
        </div>
      
    </div>

    <div class="preview-sam">サムネイルイメージ</div>
    <div class="syoukaijou-sam-disp">
    <div class="syoukaijou-sam">
    <div class="preview-syoukaijou-top-sam">
      <div class="sum-top">
        <div class="syoukaijou-day-sam">日付</div>
        <div class="syoukaijou-title-sam">タイトル</div>
        </div>
        <div class="janru-area-sam">
          <div class="jyanru"> ジャンル：</div><div class="jyanru-sub">ラーメン</div>
          <div class="area"> エリア：</div><div class="area-sub">渋川</div>
        </div>
      </div>
        <div class="preview-main-sam">
        <div class="preview-pics-sam">
          <div class="preview-pic1-sam"><img id="gazo" onclick="changeIMG()" src="/images/daruma.jpg"
   width="320" height="240" border="0" alt=""></div>
          <div class="preview-pics-sub">
            <div class="preview-pic2-sam"></div>
            <div class="preview-pic3-sam"></div>
            <div class="preview-pic4-sam"></div>
          </div>
        </div>
        <div class="preview-honbun">
          <div class="honbun-sum">本文</div>
          <div class="ittemitai"></div>
         <div class="ittayo"></div>
        </div>
      </div>
      </div>
    </div>

    <div class="preview-bottom">
      <div>この内容で投稿します。</div>
      <div class="preview-button-sub"><a class="btn-daidai" href=#>投稿する</a></div>
      <div>戻る</div>
    </div>
    </div>
    @endsection