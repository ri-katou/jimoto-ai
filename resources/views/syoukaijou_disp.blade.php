@extends('layout')
@section('content')
<div class="disp-top">
  <div class="return">戻る</div>
  @if($syoukaijou[0]->creater_id == Auth::id())
  <div class="delete"><a class="disp-delete" href=#>この投稿を削除する</a></div>
  @endif
</div>
<div class="syoukaijou">
  <div class="preview-syoukaijou-top">
    <div class="syoukaijou-day">{{$syoukaijou[0]->create_day}}</div>
    <div class="janru-area">
      <div class="janru-tag">
        <div class="jyanru"></div>
        <div class="jyanru-sub">{{ $syoukaijou[0]->category_name}}</div>
      </div>
      <div class="area-tag">
        <div class="area"></div>
        <div class="area-sub">{{ $syoukaijou[0]->municipalities_name}}</div>
      </div>
    </div>
  </div>
  <div class="syoukaijou-title">{{$syoukaijou[0]->title}}</div>
  <div class="preview-main">
    <div class="preview-pics">
      <div class="preview-pic1"><img src="{{$syoukaijou[0]->image1}}" alt="1枚目"></div>
      <div class="preview-pics-sub">
        <div class="preview-pic2"><img src="{{$syoukaijou[0]->image2}}" alt="2枚目"></div>
        <div class="preview-pic3"><img src="{{$syoukaijou[0]->image3}}" alt="3枚目"></div>
        <div class="preview-pic4"><img src="{{$syoukaijou[0]->image4}}" alt="4枚目"></div>
      </div>
    </div>
    <div class="preview-honbun">
      <div class="preview-spot">
        <div class="spotname">{{$syoukaijou[0]->spotname}}</div>
      </div>
      <div class="syoukaijou-text">{{$syoukaijou[0]->main}}</div>
      <div class="ittemitai"></div>
      <div class="ittayo"></div>
    </div>
  </div>
  <div class="preview-spot-info">
    <div class="spot-info">スポット情報</div>
    <table>
      <tr>
        <td height="30" width="100">スポット名</td>
        <td class="spot-name" height="30">{{$syoukaijou[0]->spotname}}</td>
      </tr>
      <tr>
        <td height="30">住所</td>
        <td class="spot-address" height="30">{{$syoukaijou[0]->address}}</td>
      </tr>
      <tr>
        <td height="30">URL</td>
        <td class="spot-url" height="30">{{$syoukaijou[0]->url}}</td>
      </tr>
    </table>
  </div>
  <div class="disp-map">
  </div>
  <div id="map" class="spot-map"></div>


</div>

{{-- ここから画面表示しない --}}
<div class="address-choice" style="display: none;">
  <div class="item-unique">
    </p>
    <p class="item-in-address">
      スポット名：{{$syoukaijou[0]->address}},住所：{{$syoukaijou[0]->address}}
    </p>
  </div>
</div>
{{-- ここまで画面表示しない --}}
<script>
  function initMap() {
    let map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: {
        lat: 36.653141021728516,
        lng: 150.644
      }
    });
    let geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, map);
  }

  function geocodeAddress(geocoder, resultsMap) {
    // ここに紹介状テーブルのアドレス列の数字を一個づつ入れて行って処理を実行したい
    let addresspin = document.querySelectorAll('.address-choice .item-in-address')
    let urlpin = document.getElementById('spot-url')
    let infoWindows = [];
    let origin = location.origin;

    // 取得したアドレスが住所形式かのバリデーション

    addresspin.forEach(function(element) {
      let spotinfo = '<div class="sample">' +
        element.textContent.replace(',', '<br>') +
        '</div>';
      let trimname = element.textContent.substr((element.textContent).indexOf(',') + 4);
      console.log(trimname);
      geocoder.geocode({
        'address': element.textContent
      }, function(results, status) {
        if (status === 'OK') {
          console.log(status);
          resultsMap.setCenter(results[0].geometry.location);
          let marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location
          });

          let infoWindow = new google.maps.InfoWindow({
            content: spotinfo
            //複数の要素をコンテントで送る方法
          });

          marker.addListener('click', function() {
            // 開いている infoWindow を閉じる
            infoWindows.forEach(function(infoWin) {
              infoWin.close();
            });

            // クリックしたマーカーに関連する infoWindow を開く
            infoWindow.open(map, this);
          });

          // infoWindow を配列に追加
          infoWindows.push(infoWindow);
        } else {
          // statusが='OK'でない場合mapを非表示にする
          document.getElementById("map").classList.add("hidden")
        }
      });
    })
  };
</script>
@endsection