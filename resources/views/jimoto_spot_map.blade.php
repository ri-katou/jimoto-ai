@extends('layout')
@section('content')


<div class="jimoto-search-top">
  <div class="jimoto-search">
    <form action="{{ route('keyword.search') }}" method="get" class="serchForm container">
      <input type="text" name="search" placeholder="キーワードを入力">
      <input type="submit" value="検索" name="sourtNew">
    </form>
  </div>

</div>
@if($errors->any())
<div class="error-message text-align-center">
  <ul>
    @error('search')
    <li>{{ $message }}</li>
    @enderror
  </ul>
</div>
@endif

<div class="janru-area-search">
  <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}#aria">エリアを指定して探す</a></div>
  <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}#genre">ジャンルを指定して探す</a></div>
  <div class="map-search"><a class="btn-gray" href="{{ route('spot.map') }}">マップから探す</a></div>
</div>



<div class="spot-map">
  <div class="spot-filter-map block-green">マップで探す</div>

  <div id="map" class="spot-map"></div>

  <div class="address-choice" style="display: none;">
    @foreach ($spot as $item)
    <div class="item-unique">
      <p class="item-in-address">
        スポット名：{{$item->spotname}},住所：{{$item->address}}
      </p>
      <p>
        https://jimotoai.onrender.com:/syoukaijou/{{$item->id}}
      </p>
    </div>
    @endforeach
  </div>

  </form>
  @endsection

  @section('script')
  <script>
    function initMap() {
      function success(pos) {
        //現在地の取得
        var lat = pos.coords.latitude;
        var lng = pos.coords.longitude;
        var latlng = new google.maps.LatLng(lat, lng);

        let map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: latlng
        });
        var marker = new google.maps.Marker({
          position: latlng,
          map: map,
          icon: {
            fillColor: "blue", //塗り潰し色
            fillOpacity: 0.7, //塗り潰し透過率
            path: google.maps.SymbolPath.CIRCLE, //円を指定
            scale: 10, //円のサイズ
            strokeColor: "#FF0000", //枠の色
            strokeWeight: 0 //枠の透過率
          }
        }) //現在地のマーカー

        let geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);
      }

      function fail(error) {
        alert('位置情報の取得に失敗しました。エラーコード：' + error.code);
        var latlng = new google.maps.LatLng(35.6812405, 139.7649361); //東京駅
        var map = new google.maps.Map(document.getElementById('maps'), {
          zoom: 10,
          center: latlng
        });
      }
      navigator.geolocation.getCurrentPosition(success, fail);
    }



    function geocodeAddress(geocoder, resultsMap) {
      // ここに紹介状テーブルのアドレス列の数字を一個づつ入れて行って処理を実行したい
      let addresspin = document.querySelectorAll('.address-choice .item-in-address')
      let spotname = document.querySelectorAll('.address-choice .item-in-spotname')
      let origin = location.origin;
      let infoWindows = [];

      addresspin.forEach(function(element) {
        let getMapid = (element.nextElementSibling.textContent).trim();
        // let routesmap = location.protocol + '//' + location.hostname + ':80/syoukaijou/' + getMapid + '/';
        console.log(getMapid);
        let spotinfo = '<div class="sample"><a href=" ' + getMapid + '">' +
          element.textContent.replace(',', '<br>') +
          '</a></div>';
        let trimname = element.textContent.substr((element.textContent).indexOf(',') + 4);
        geocoder.geocode({
          'address': trimname
        }, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            let marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location,
            });

            let infoWindow = new google.maps.InfoWindow({
              content: spotinfo
            });

            // infoWindow を配列に追加
            infoWindows.push(infoWindow);
            marker.addListener('click', function() {
              // 開いている infoWindow を閉じる
              infoWindows.forEach(function(infoWin) {
                infoWin.close();
              });

              // クリックしたマーカーに関連する infoWindow を開く
              infoWindow.open(map, this);
            });
          }
        });
      })
    };
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key={{env('GEO_API_KEY', '')}}&callback=initMap">
  </script>
  @endsection