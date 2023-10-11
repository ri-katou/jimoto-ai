@extends('layout')
@section('content')
<div class="preview-top">
  <div class="preview-daimei">紹介状作成</div>
  <div class="return">戻る</div>
</div>
<div class="preview-naiyou">この内容でよろしいですか？</div>
<div class="syoukaijou">
  <div class="preview-syoukaijou-top">
    <div class="syoukaijou-day">{{$day}}</div>
    <div class="janru-area">
      <div class="janru-tag">
        <div class="jyanru"></div>
        <div class="jyanru-sub">{{ $category->category_name}}</div>
      </div>
      <div class="area-tag">
        <div class="area"></div>
        <div class="area-sub">{{ $municipalitie->municipalities_name}}</div>
      </div>
    </div>
  </div>
  <div class="syoukaijou-title">{{$Request->title}}</div>
  <div class="preview-main">
    <div class="preview-pics">
      <div class="preview-pic1"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg" border="0" alt=""></div>
      {{$Request->image1}}
      <div class="preview-pics-sub">
        <div class="preview-pic2"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg" border="0" alt=""></div>
        <div class="preview-pic3"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg" border="0" alt=""></div>
        <div class="preview-pic4"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg" border="0" alt=""></div>
      </div>
    </div>
    <div class="preview-honbun">
      <div class="preview-spot">
        <div class="spotname">{{$Request->spotname}}</div>
      </div>
      <div class="syoukaijou-text">{{$Request->main}}</div>
      <div class="ittemitai"></div>
      <div class="ittayo"></div>
    </div>
  </div>
  <div class="preview-spot-info">
    <div class="spot-info">スポット情報</div>
    <table>
      <tr>
        <td height="30" width="100">スポット名</td>
        <td class="spot-name" height="30">{{$Request->spotname}}</td>
      </tr>
      <tr>
        <td height="30">住所</td>
        <td class="spot-address" height="30">{{$Request->address}}</td>
      </tr>
      <tr>
        <td height="30">URL</td>
        <td class="spot-url" height="30">{{$Request->url}}</td>
      </tr>
    </table>
  </div>

</div>

<div class="preview-sam-all">
  <div class="preview-sam">サムネイルイメージ</div>
  <div class="syoukaijou-sam">
    <div class="preview-syoukaijou-top-sam">
      <div class="sum-top">
        <div class="syoukaijou-day-sam">{{$day}}</div>
        <div class="syoukaijou-title-sam">{{$Request->title}}</div>
      </div>
      <div class="janru-area-sam">
        <div class="janru-tag"><div class="jyanru-sub">{{ $category->category_name}}</div>
        </div>
        <div class="area-tag"><div class="area-sub">{{ $municipalitie->municipalities_name}}</div>
        </div>
      </div>
    </div>
    <div class="preview-main-sam">
      <div class="preview-pics-sam">
        <div class="preview-pic1-sam"><img id="gazo" src="{{asset($Request->image1)}}" width="100%" height="100%" border="0" alt=""></div>
        <div class="preview-pics-sub">
          <div class="preview-pic2-sam"></div>
          <div class="preview-pic3-sam"></div>
          <div class="preview-pic4-sam"></div>
        </div>
      </div>
      <div class="preview-honbun">
        <div class="honbun-sum">{{$Request->main}}</div>
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
</div>
<div class="preview-bottom">
  <div class="preview-bottom-text">この内容で投稿します。</div>
  <div class="preview-button-sub">
    <form action="{{ route('create') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="{{$Request->title}}" name="title">
      <input type="hidden" value="{{$Request->main}}" name="main">
      <input type="hidden" value="{{$Request->image1}}" name="image1">
      <input type="hidden" value="{{$Request->image2}}" name="image2">
      <input type="hidden" value="{{$Request->image3}}" name="image3">
      <input type="hidden" value="{{$Request->image4}}" name="image4">
      <input type="hidden" value="{{$category->id}}" name="category">
      <input type="hidden" value="{{$municipalitie->id}}" name="municipalitie">
      <input type="hidden" value="{{$Request->spotname}}" name="spotname">
      <input type="hidden" value="{{$Request->address}}" name="address">
      <input type="hidden" value="{{$Request->url}}" name="url">
      <input type="submit" class="btn-daidai" value="投稿する">
    </form>
  </div>
</div>

<div class="return">戻る</div>

@endsection