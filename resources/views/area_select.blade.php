@extends('layout')
@section('content')

<div class="yu-sei area-choice midasi block-green">エリア選択画面</div>

<div class="area-teach">あなたの素敵な地元を教えてください!!</div>
<div class="hidden" id="mask"></div>
<form action="{{route('area.select')}}" method="post">
  @csrf
  <div class="area-select-choice">
    <div class="toubu">
      <div class="yu-sei midasi area-select-top underline-orange">東武</div>
      <div class="city-select">
        @foreach($toubu as $tou)
        <li>
          <input type="radio" name="area_choice" class="area_choice" value="{{$tou['id']}}">
          {{$tou['municipalities_name']}}
        </li>
        @endforeach
      </div>
    </div>


    <div class="seibu">
      <div class="yu-sei midasi area-select-top underline-blue">西部</div>
      <div class="city-select">
        @foreach($seibu as $sei)
        <li>
          <input type="radio" name="area_choice" class="area_choice" value="{{$sei['id']}}">
          {{$sei['municipalities_name']}}
        </li>
        @endforeach
      </div>
    </div>


    <div class="kenou">
      <div class="yu-sei midasi area-select-top underline-pink">県央</div>
      <div class="city-select">
        @foreach($kenou as $ken)
        <li>
          <input type="radio" name="area_choice" class="area_choice" value="{{$ken['id']}}">
          {{$ken['municipalities_name']}}
        </li>
        @endforeach
      </div>
    </div>


    <div class="agatumas">
      <div class="yu-sei area-select-top underline-green">吾妻</div>
      <div class="city-select">
        @foreach($agatuma as $aga)
        <li>
          <input type="radio" name="area_choice" class="area_choice" value="{{$aga['id']}}">
          {{$aga['municipalities_name']}}
        </li>
        @endforeach
      </div>
    </div>

    <div class="tone">
      <div class="yu-sei midasi area-select-top underline-purple">利根・沼田</div>
      <div class="city-select">
        @foreach($tone_numata as $numatacity)
        <li>
          <input type="radio" name="area_choice" class="area_choice" value="{{$numatacity['id']}}">
          {{$numatacity['municipalities_name']}}
        </li>
        @endforeach
      </div>
    </div>
  </div>
  <div class="area-select-center">
    <div class="answer btn-green" id="answer">OK</div>
  </div>
  <div class="modal" id="modal">
    <div class="check-text-space">
      <div class="area-text btn-white">無し</div>
    </div>
    <div class="area-check-text">こちらの内容でよろしいですか？</div>
    <div class="modal-space">
      <div class="exit-space">
        <div class="close exit" id="close">戻る</div>
        <div><input type="submit" class="btn-green-modal" value="登録する"></div>
      </div>
    </div>
  </div>
  <!-- <div><input type="submit" class="btn-green" value="OK"></div> -->
</form>

<!-- <div class="area-photo"><img src="/image/gunma.png" class="area-img"></div> -->
@endsection