@extends('layout')
@section('content')
<div class="disp-top">
  <div class="return">戻る</div>
  <div class="delete"><a class="disp-delete" href=#>この投稿を削除する</a></div>
</div>
<div class="syoukaijou">
  <div class="preview-syoukaijou-top">
    <div class="syoukaijou-day">{{$syoukaijou->created_at}}</div>
    <div class="janru-area">
      <div class="janru-tag">
        <div class="jyanru"></div>
        <div class="jyanru-sub">{{ $syoukaijou->category_name}}</div>
      </div>
      <div class="area-tag">
        <div class="area"></div>
        <div class="area-sub">{{ $syoukaijou->municipalities_name}}</div>
      </div>
    </div>
  </div>
  <div class="syoukaijou-title">{{$syoukaijou->title}}</div>
  <div class="preview-main">
    <div class="preview-pics">
      <div class="preview-pic1"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg" border="0" alt=""></div>
      {{$syoukaijou->image1}}
      <div class="preview-pics-sub">
        <div class="preview-pic2"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg" border="0" alt=""></div>
        <div class="preview-pic3"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg" border="0" alt=""></div>
        <div class="preview-pic4"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg" border="0" alt=""></div>
      </div>
    </div>
    <div class="preview-honbun">
      <div class="preview-spot">
        <div class="spotname">{{$syoukaijou->spotname}}</div>
      </div>
      <div class="syoukaijou-text">{{$syoukaijou->main}}</div>
      <div class="ittemitai"></div>
      <div class="ittayo"></div>
    </div>
  </div>
  <div class="preview-spot-info">
    <div class="spot-info">スポット情報</div>
    <table>
      <tr>
        <td height="30" width="100">スポット名</td>
        <td class="spot-name" height="30">{{$syoukaijou->spotname}}</td>
      </tr>
      <tr>
        <td height="30">住所</td>
        <td class="spot-address" height="30">{{$syoukaijou->address}}</td>
      </tr>
      <tr>
        <td height="30">URL</td>
        <td id="spot-url" class="spot-url" height="30">{{$syoukaijou->url}}</td>
      </tr>
    </table>
  </div>

</div>


<div class="disp-map">
</div>

<div id="map" class="spot-map"></div>

<div class="address-choice" style="display: none;">
  <div class="item-unique">
    </p>
    <p class="item-in-address">
      スポット名：{{$syoukaijou->address}},住所：{{$syoukaijou->address}}
    </p>
  </div>
</div>
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
          alert('以下の理由でジオコードに失敗しました。: ' + status);
        }
      });
    })
  };
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{env('GEO_API_KEY', ''),}}&callback=initMap">
</script>
@endsection