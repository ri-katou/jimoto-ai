@extends('layout')
@section('content')
<div class="post-all-list">
  <div class="post-list-header">
    <div class="list-head">
      <a href="{{route('home.post.check')}}">
        <div class="post-syoukaijou-head container">
          <div class="post-img"><img src="/image/mail8.svg" alt class="free-svg"></div>
          <div class="post-head-font">投稿した紹介状</div>

        </div>
      </a>
    </div>
    <div class="list-head">
      <a href="{{route('home.interest.check')}}">
        <div class="post-syoukaijou-head container">
          <div class="post-img"><img src="/image/hart2.svg" alt="free-svg"></div>
          <div class="post-head-font post-underline-green">行ってみたい</div>

        </div>
      </a>
    </div>
    <div class="list-head">
      <a href="{{route('home.visit.check')}}">
        <div class="post-syoukaijou-head container">
          <div class="post-img"><img src="/image/goal.svg" alt class="free-svg"></div>
          <div class="post-head-font">行ったよ</div>

        </div>
      </a>
    </div>
  </div>
  <div class="all-list">
    <div class="post-all-space">
      <div class="syoukaijougrit">
        <div class="post-grid">
          {{-- ここから紹介状１枚 --}}
          <div class="syoukaijou-card">
            @foreach ($interestAll as $item)
            <a class="syoukaijou-link" href="{{ route('syoukaijou.disp', ['id' => $item->syoukaijous_id]) }}">
                <div class="syou">
                    <div class="syoukaijou-sam">
                        <div class="preview-syoukaijou-top-sam">
                            <div class="sum-top">
                                <div class="syoukaijou-day-sam">{{ $item->create_day }}</div>
                                <div class="syoukaijou-title-sam">{{ $item->title }}</div>
                            </div>
                            <div class="janru-area-sam">
                                <div class="janru-tag">
                                    {{ $item->category_name }}
                                </div>
                                <div class="area-tag">
                                    <div class="area-sub">{{ $item->municipalities_name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="preview-main-sam">
                            <div class="preview-pics-sam">
                                <div class="preview-pic1-sam"><img id="gazo" src="{{$item->image1}}"></div>
                                <div class="preview-pics-sub">
                                    <div class="preview-pic2-sam"></div>
                                    <div class="preview-pic3-sam"></div>
                                    <div class="preview-pic4-sam"></div>
                                </div>
                            </div>
                            <div class="preview-honbun">
                                <div class="honbun-sum">{{ $item->body }}</div>
                                <div class="fav_btn" id="{{ $item->syoukaijous_id }}"
                                    data-me="{{ Auth::id() }}">
                                    <div class="fav_btn-interest">
                                        <i
                                            class="fav_btn-interest-icon fas fa-heart 
    @foreach ($interest_list as $value)
    @if ($item->syoukaijous_id == $value->syoukaijou_id)
     interest-active
    @endif @endforeach
    "></i>
                                        <div class="interest-count">
                                          {{$item->interest_count}}
                                        </div>
                                    </div>

                                    <div class="fav-btn-visited">
                                        <i
                                            class="fav_btn-visited-icon fas fa-flag 
    @foreach ($visited_list as $value)
    @if ($item->syoukaijous_id == $value->syoukaijou_id)
    visited-active
    @endif @endforeach
    "></i>
                                        <div class="visited-count">
                                          {{$item->visited_count}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        {{-- ここまで紹介状1枚 --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection