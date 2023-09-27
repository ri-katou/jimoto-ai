@extends('layout')
@section('content')
<div class="syoukaijou_create">
  <div class="syoukaijou-top">
    <div class="syoukaijou-daimei">紹介状作成</div>
    <div class="return">戻る</div>
  </div>
  <div class="syoukaijou-create">
    <div class="syoukaijou-title">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="syoukaijou-title-daimei">
          <div class="yusei">タイトル入力(必須)</div>
        </div>
        <div><textarea name="title" id="" cols="80" rows="1"></textarea></div>
    </div>
    <div class="syoukaijou-main">
      <div class="syoukaijou-honbun">本文（必須）</div>
      <div class="form"><textarea name="main" id="" cols="80" rows="20"></textarea></div>
    </div>
    <div class="syoukaijou-pic">
      <!-- データのエンコード方式である enctype は、必ず以下のようにしなければなりません -->
      <form enctype="multipart/form-data" action="__URL__" method="POST">
        <!-- MAX_FILE_SIZE は、必ず "file" input フィールドより前になければなりません -->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- input 要素の name 属性の値が、$_FILES 配列のキーになります -->
        このファイルをアップロード: <input name="userfile" type="file" />
        <input type="submit" value="ファイルを送信" />
      </form>
    </div>
    <div class="syoukaijou-jyanru-area">
      <div class="syoukaijou-jyanru">
        <div class="syoukaijou-jyanru-title">ジャンル</div>
        <div class="janru-select"><select name="jyanru" id=""></select></div>
      </div>
      <div class="syoukaijou-area">
        <div class="syoukaijou-area-title">エリア</div><br><br>
        <div class="area-select"><select name="area" id=""></select></div>
      </div>
    </div>
    <div class="syoukaijou-supot">
      <div class="syoukaijou-supot-title">スポット情報</div>
      <div class="syoukaijou-supot-name">スポット名、店名（必須）</div>
      <div class="form"><textarea name="" id="" cols="80" rows="1"></textarea></div>
      <div class="syoukaijou-supot-zyusyo">住所（任意）</div>
      <div class="form"><textarea name="zyusyo" id="" cols="80" rows="1"></textarea></div>
      <div class="syoukaijou-supot-url">URL（任意）</div>
      <div class="form"><textarea name="url" id="" cols="80" rows="1"></textarea></div>
    </div>
    <div class="syoukaijou-bottom">
      <div class="return">戻る</div>
      <div class="syoukaijou-pic-button"><a class="btn-daidai" href=#>投稿する</a></div>
      </form>
    </div>
  </div>
</div>
@endsection