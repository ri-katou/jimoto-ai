@extends('layout')
@section('content')
<div class="preview-top">
    <div class="preview-daimei">紹介状作成</div>
    <div class="return">戻る</div>
</div>
<div class="preview-naiyou">この内容でよろしいですか？</div>
<div class="syoukaijou">
    <div class="preview-syoukaijou-top">
        <div class="syoukaijou-day">{{ $day }}</div>
        <div class="janru-area">
            <div class="janru-tag">
                <div class="jyanru"></div>
                <div class="jyanru-sub">{{ $category->category_name }}</div>
            </div>
            <div class="area-tag">
                <div class="area"></div>
                <div class="area-sub">{{ $municipalitie->municipalities_name }}</div>
            </div>
        </div>
    </div>
    <div class="syoukaijou-title underline-green">{{ $Request->title }}</div>
    <div class="preview-main">
        <div class="preview-pics">
            <div class="preview-pic1"><img src="storage/{{$file_name1}}"></div>
            <div class="preview-pics-sub">
                <div class="preview-pic2"><img src="{{$imagePath2 . $file_name2}}" alt=""></div>
                <div class="preview-pic3"><img src="{{$imagePath3 . $file_name3}}" alt=""></div>
                <div class="preview-pic4"><img src="{{$imagePath4 . $file_name4}}" alt=""></div>
            </div>
        </div>
        <div class="preview-honbun">
            <div class="preview-spot">
                <div class="spotname">{{ $Request->spotname }}</div>
            </div>
            <div class="syoukaijou-text">{{ $Request->main }}</div>
            <div class="ittemitai"></div>
            <div class="ittayo"></div>
        </div>
    </div>
    <div class="preview-spot-info">
        <div class="spot-info">スポット情報</div>
        <table>
            <tr>
                <td height="30" width="100">スポット名</td>
                <td class="spot-name" height="30">{{ $Request->spotname }}</td>
            </tr>
            <tr>
                <td height="30">住所</td>
                <td class="spot-address" height="30">{{ $Request->address }}</td>
            </tr>
            <tr>
                <td height="30">URL</td>
                <td class="spot-url" height="30">{{ $Request->url }}</td>
            </tr>
        </table>
    </div>

</div>

<div class="preview-sam-all">
    <div class="preview-sam">サムネイルイメージ</div>
    <div class="syoukaijou-card">
        <div class="syou">
            <div class="syoukaijou-sam">
                <div class="preview-syoukaijou-top-sam">
                    <div class="sum-top">
                        <div class="syoukaijou-day-sam">{{ $day }}</div>
                        <div class="syoukaijou-title-sam underline-green">{{ $Request->title }}</div>
                    </div>
                    <div class="janru-area-sam">
                        <div class="janru-tag">
                            {{ $category->category_name }}
                        </div>
                        <div class="area-tag">
                            <div class="area-sub">{{ $municipalitie->municipalities_name }}</div>
                        </div>
                    </div>
                </div>
                <div class="preview-main-sam">
                    <div class="preview-pics-sam">
                        <div class="preview-pic1-sam"><img src="storage/{{$file_name1}}" alt=""></div>
                    </div>
                    <div class="preview-honbun">
                        <div class="honbun-sum">{{ $Request->main }}</div>
                    </div>
                </div>
                <div class="fav_btn">
                    <div class="fav_btn-interest">
                        <i class="fav_btn-interest-icon fas fa-heart interest-active"></i>
                    </div>
                    <div class="fav-btn-visited">
                        <i class="fav_btn-visited-icon fas fa-flag visited-active"></i>
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
            <input type="hidden" value="{{ $Request->title }}" name="title">
            <input type="hidden" value="{{ $Request->main }}" name="main">
            <input type="hidden" value="{{ $file_name1 }}" name="image1">
            <input type="hidden" value="{{ $imagePath2 . $file_name2 }}" name="image2">
            <input type="hidden" value="{{ $imagePath3 . $file_name3 }}" name="image3">
            <input type="hidden" value="{{ $imagePath4 . $file_name4 }}" name="image4">
            <input type="hidden" value="{{ $category->id }}" name="category">
            <input type="hidden" value="{{ $municipalitie->id }}" name="municipalitie">
            <input type="hidden" value="{{ $Request->spotname }}" name="spotname">
            <input type="hidden" value="{{ $Request->address }}" name="address">
            <input type="hidden" value="{{ $Request->url }}" name="url">
            <input type="submit" class="btn-daidai" value="投稿する">
        </form>
    </div>
</div>
<div class="preview-back">
    <div class="return">戻る</div>
</div>


@endsection