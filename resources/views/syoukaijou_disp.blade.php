@extends('layout')
  @section('content')
  <div class="disp-top">
<div class="return">戻る</div>
<div class="delete"><a class="disp-delete" href=#>この投稿を削除する</a></div>
</div>
<div class="syoukaijou">
  <div class="preview-syoukaijou-top">
    <div class="syoukaijou-day">日付</div>
    <div class="janru-area">
      <div class="janru-tag">
      <div class="jyanru"> ジャンル：</div>
      <div class="jyanru-sub">ラーメン</div>
      </div>
      <div class="area-tag">
      <div class="area"> エリア：</div>
      <div class="area-sub">渋川</div>
      </div>
    </div>
  </div>
  <div class="syoukaijou-title">タイトル</div>
  <div class="preview-main">
    <div class="preview-pics">
      <div class="preview-pic1"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg"  border="0" alt=""></div>
      <div class="preview-pics-sub">
        <div class="preview-pic2"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg"  border="0" alt=""></div>
        <div class="preview-pic3"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg"  border="0" alt=""></div>
        <div class="preview-pic4"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg"  border="0" alt=""></div>
      </div>
    </div>
    <div class="preview-honbun">
      <div class="preview-spot">スポット名&emsp;<div class="spotname"></div>
      </div>
      <div class="syoukaijou-text">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
</div>
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


    <div class="disp-map"> まあああああああああああああああああああああああああああああああああああああああああああああああああああああああぷ</div>
    @endsection