@extends('layout')
@section('content')
<div class="syoukaijou_create">
  <div class="syoukaijou-top">
    <div class="syoukaijou-daimei">紹介状作成</div>
    <div class="return">戻る</div>
  </div>
  <div class="syoukaijou-create">
    <form action="{{ route('preview.edit') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="syoukaijou-title">

        <div class="syoukaijou-title-daimei">
          <div class="yusei">タイトル入力(必須)</div>
        </div>
        @if($errors->any())
        <div class="error-message">
          <ul>
            @error('title')
            <li>{{ $message }}</li>
            @enderror
          </ul>
        </div>
        @endif
        <div><textarea name="title" id="" cols="80" rows="2">{{ old('title') }}</textarea></div>
      </div>
      <div class="syoukaijou-main">
        <div class="syoukaijou-honbun">本文（必須）</div>
        @if($errors->any())
        <div class="error-message">
          <ul>
            @error('main')
            <li>{{ $message }}</li>
            @enderror
          </ul>
        </div>
        @endif
        <div class="form"><textarea name="main" id="" cols="80" rows="20">{{ old('main') }}</textarea></div>
      </div>
      <div class="syoukaijou-view">スポットビュー（１枚必須）</div>
      @if($errors->any())
        <div class="error-message">
          <ul>
            @error('image1')
            <li>{{ $message }}</li>
            @enderror
          </ul>
        </div>
        @endif
      <div class="syoukaijou-pic">
        <input type="file" name="image1">
        <input type="file" name="image2">
        <input type="file" name="image3">
        <input type="file" name="image4">
      </div>
      <div class="syoukaijou-jyanru-area">
        <div class="syoukaijou-jyanru">
          <div class="syoukaijou-jyanru-title">ジャンル
            @if($errors->any())
            <div class="error-message">
              <ul>
                @error('janru')
                <li>{{ $message }}</li>
                @enderror
              </ul>
            </div>
            @endif
            <div class="form-group">
              <select class="form-control" id="id" name="category">
                @foreach ($category as $item)
                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="syoukaijou-area">

          <div class="syoukaijou-area-title">エリア
            @if($errors->any())
            <div class="error-message">
              <ul>
                @error('area')
                <li>{{ $message }}</li>
                @enderror
              </ul>
            </div>
            @endif
            <div class="area-select">
              <div class="form-group">
                <select class="form-control" id="id" name="municipalitie">
                  @if(count($userdetail)>0)
                    @if($item->id = $userdetail[0]->municipalitie_id)
                    <option value="{{ $userdetail[0]->municipalitie_id }}" selected>{{$userdetail[0]->municipalities_name}}</option>
                    @endif
                    @endif
                  @foreach ($municipalitie as $item)
                  <option value="{{ $item->id }}">{{ $item->municipalities_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="syoukaijou-supot">
        <div class="syoukaijou-supot-title">スポット情報</div>
        <div class="syoukaijou-supot-name">スポット名、店名（必須）</div>
        @if($errors->any())
        <div class="error-message">
          <ul>
            @error('title')
            <li>{{ $message }}</li>
            @enderror
          </ul>
        </div>
        @endif
        <div class="form"><textarea name="spotname" id="" cols="80" rows="1">{{ old('spotname') }}</textarea></div>
        <div class="syoukaijou-supot-zyusyo">住所（任意）</div>
        <div class="form"><textarea name="address" id="" cols="80" rows="1">{{ old('address') }}</textarea></div>
        <div class="syoukaijou-supot-url">URL（任意）</div>
        <div class="form"><textarea name="url" id="" cols="80" rows="1">{{ old('url') }}</textarea></div>
      </div>

      <div class="syoukaijou-bottom">
        <div class="return">戻る</div>
        <div class="syoukaijou-pic-button"><input class="btn-daidai" type="submit" value="投稿する"></div>
      </div>
    </form>
  </div>
</div>
@endsection