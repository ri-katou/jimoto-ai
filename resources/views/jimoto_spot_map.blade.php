@extends('layout')
@section('content')
  <div class="jimoto-search-top">
    <div class="jimoto-search">
        <form class="keywordserch" action="{{ route('keyword.search') }}" method="get">
            <input type="search" name="search" placeholder="キーワードを入力" size="40">
            <input type="submit" value="検索する" name="sourtNew">
        </form>
    </div>
    <select name="example">
      <option>新着順</option>
      <option>行ってみたいが多い順</option>
      <option>訪問済みが多い順</option>
    </select>
  </div>
  @if($errors->any())
        <div class="error-message">
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
          {{$item->id}}
        </p>
      </div>
      @endforeach
    </div>
    
</form>
@endsection

@section('script')
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
    geocodeAddress(geocoder, map);
  }

  function geocodeAddress(geocoder, resultsMap) {
    // ここに紹介状テーブルのアドレス列の数字を一個づつ入れて行って処理を実行したい
    let addresspin = document.querySelectorAll('.address-choice .item-in-address')
    let spotname = document.querySelectorAll('.address-choice .item-in-spotname')
    let origin = location.origin;
    let infoWindows = [];


    addresspin.forEach(function(element) {
      let getMapid = (element.nextElementSibling.textContent).trim();
      let routesmap = '/syoukaijou/' + getMapid + '/';
      let spotinfo = '<div class="sample"><a href=" ' + origin + routesmap + '">' +
        element.textContent.replace(',', '<br>') +
        '</a></div>';
      let trimname = element.textContent.substr((element.textContent).indexOf(',') + 4);
      geocoder.geocode({
        'address': trimname
      }, function(results, status) {
        if (status === 'OK') {
          console.log(results);
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{env('GEO_API_KEY', ''),}}&callback=initMap">
</script>
@endsection