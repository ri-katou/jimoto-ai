@extends('layout')
@section('content')

<div class="jimoto-search-top">
  <div class="jimoto-search">
    <form action="{{ route('keyword.search') }}" method="get">
      <input type="search" name="search" placeholder="キーワードを入力" size="40">
      <input type="submit" value="検索する">
    </form>
  </div>
  <select name="example">
    <option>新着順</option>
    <option>行ってみたいが多い順</option>
    <option>訪問済みが多い順</option>
  </select>
</div>

<div class="janru-area-search">
  <div class="janru-search"><a class="btn-gray" href="{{route('spot.filter')}}#aria">エリアを指定して探す</a></div>
  <div class="janru-search"><a class="btn-gray" href="{{route('spot.filter')}}#genre">ジャンルを指定して探す</a></div>
  <div class="map-search"><a class="btn-gray" href=#>マップから探す</a></div>
</div>




<div class="jimoto-sam">
@foreach ($syoukaijou as $item)
<a class="syoukaijou-link" href="">
  <div class="syoukaijou-sam">
    <div class="preview-syoukaijou-top-sam">
      <div class="sum-top">
        <div class="syoukaijou-day-sam">{{$item->updated_at}}</div>
        <div class="syoukaijou-title-sam">{{$item->title}}</div>
      </div>
      <div class="janru-area-sam">
        <div class="janru-tag"><div class="jyanru-sub">{{$item->category_name}}</div>
        </div>
        <div class="area-tag"><div class="area-sub">{{$item->municipalities_name}}</div>
        </div>
      </div>
    </div>
    <div class="preview-main-sam">
      <div class="preview-pics-sam">
        <div class="preview-pic1-sam"><img id="gazo" src="{{asset($item->image1)}}" width="100%" height="100%" border="0" alt=""></div>
        <div class="preview-pics-sub">
          <div class="preview-pic2-sam"></div>
          <div class="preview-pic3-sam"></div>
          <div class="preview-pic4-sam"></div>
        </div>
      </div>
      <div class="preview-honbun">
        <div class="honbun-sum">{{$item->body}}</div>
        <div class="fav_btn">
          <div class="fav_btn-ittemitai">
            <i class="fa-ittemitai" aria-hidden="true"><svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" style="width: 40px; height: 40px; opacity: 1;" xml:space="preserve">
                <style type="text/css">
                  .st0 {
                    fill: #4B4B4B;
                  }
                </style>
                <g>
                  <path class="st0" d="M473.984,74.248c-50.688-50.703-132.875-50.703-183.563,0c-17.563,17.547-29.031,38.891-34.438,61.391
		c-5.375-22.5-16.844-43.844-34.406-61.391c-50.688-50.703-132.875-50.703-183.563,0c-50.688,50.688-50.688,132.875,0,183.547
		l217.969,217.984l218-217.984C524.672,207.123,524.672,124.936,473.984,74.248z" style="fill: rgb(255, 175, 223);"></path>
                </g>
              </svg>
            </i>
            <div class="ittemitai-math">0</div>
          </div>

          <div class="fav-btn-ittayo">
            <i class="fa-ittayo" aria-hidden="true"><svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 40px; height: 40px; opacity: 1;" xml:space="preserve">
                <style type="text/css">
                  .st0 {
                    fill: #4B4B4B;
                  }
                </style>
                <g>
                  <path class="st0" d="M256,0C114.608,0.018,0.018,114.598,0,256c0.018,141.392,114.608,255.982,256,256
		c141.393-0.018,255.982-114.608,256-256C511.982,114.598,397.393,0.018,256,0z M404.696,404.697
		c-38.134,38.089-90.554,61.571-148.696,61.589c-58.143-0.018-110.571-23.5-148.697-61.589
		C69.214,366.572,45.724,314.143,45.714,256c0.009-58.143,23.5-110.571,61.589-148.697C145.429,69.214,197.857,45.724,256,45.714
		c58.143,0.009,110.563,23.5,148.696,61.589c38.089,38.126,61.58,90.554,61.589,148.697
		C466.277,314.143,442.786,366.572,404.696,404.697z" style="fill: rgb(192, 192, 192);"></path>
                  <polygon class="st0" points="185.169,165.33 185.169,373.027 211.134,373.027 211.134,282.16 347.429,282.16 347.429,165.33 
		211.134,165.33 	" style="fill: rgb(192, 192, 192);"></polygon>
                </g>
              </svg></i>
            <div class="ittayo-math">0</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </a>
  @endforeach
</div>



@endsection