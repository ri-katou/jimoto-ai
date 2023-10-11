@extends('layout')
@section('content')
<form action="" method="get">
  <div class="jimoto-search-top">
    <div class="jimoto-search">

      <input type="search" name="search" placeholder="キーワードを入力" size="40">
      <input type="submit" value="検索する">

    </div>
    <select name="example">
      <option>新着順</option>
      <option>行ってみたいが多い順</option>
      <option>訪問済みが多い順</option>
    </select>
  </div>

  <div class="janru-area-search">
    <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}#aria">エリアを指定して探す</a></div>
    <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}#genre">ジャンルを指定して探す</a></div>
    <div class="map-search"><a class="btn-gray" href=#>マップから探す</a></div>
  </div>
  </div>
  <div class="spot-map">
    <div class="spot-filter-map block-green">マップで探す</div>
    <!-- <div id="map"></div>
    <script>
      function initMap() {
        let canvas = document.getElementById('map');
        let MyLatLng = new google.maps.LatLng(36.653141021728516, 138.84703063964844);
        let Options = {
          zoom: 15, //地図の縮尺値
          center: MyLatLng, //地図の中心座標
          mapTypeId: 'roadmap' //地図の種類
        };
        let map = new google.maps.Map(canvas, Options);

        let marker = new google.maps.Marker({
          map: map, //先ほど作った、地図のインスタンス([map]) を設定
          position: MyLatLng //ピンを刺す場所 今回、ピンを挿す位置と地図の中心を同じにしています。
        });
      }
    </script> -->
    <!-- <div id="floating-panel">
      <input id="address" type="textbox" value="群馬県">
      <input id="submit" type="button" value="Geocode">
    </div> -->
    <div id="map" class="spot-map"></div>

    <div class="hoge">
      @foreach ($all_address as $item)
      <p>
        {{$item->address}}
      </p>
      @endforeach
    </div>
    <script>
      function initMap() {
        let map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {
            lat: 36.653141021728516,
            lng: 150.644
          }
        });
        let geocoder = new google.maps.Geocoder();

        // document.getElementById('submit').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
        // });
      }

      function geocodeAddress(geocoder, resultsMap) {
        // ここに紹介状テーブルのアドレス列の数字を一個づつ入れて行って処理を実行したい
        let hogehoge = document.querySelectorAll('.hoge p')
        console.log(hogehoge);
        let address = "京都府";
        geocoder.geocode({
          'address': address
        }, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            let marker = new google.maps.Marker({
              map: resultsMap, //先ほど作った、地図のインスタンス([map]) を設定
              position: results[0].geometry.location //ピンを刺す場所
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
    </script>
</form>
@endsection
