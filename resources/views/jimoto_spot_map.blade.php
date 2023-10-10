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
    <div class="map-space" id="map">
    </div>
    <div id="map"></div>
    <script>
      let MyLatLng = new google.maps.LatLng(36.653141021728516, 138.84703063964844);
      let Options = {
        zoom: 15, //地図の縮尺値
        center: MyLatLng, //地図の中心座標
        mapTypeId: 'roadmap' //地図の種類
      };
      let map = new google.maps.Map(document.getElementById('map'), Options);
    </script>
  </div>
</form>
@endsection