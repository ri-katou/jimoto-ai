@extends('layout')
@section('content')
<div class="home">
  <div class="syoukaijou-header">
    <div class="home-icon-right">
      <div class="profile-icon"></div>
      <div class="icon-prof"><a href="{{route('profile')}}">プロフィール画面へ</a></div>
    </div>
    <div class="home-icon-left">
      <div class="icon-space">
        <img src="/image/letter.svg" alt="" class="letter-svg">
        <img src="/image/magnifying-glass.svg" alt="" class="glass-svg">
        <div class="serch-syoukaijou">
          紹介状を見つける
        </div>
      </div>
    </div>
  </div>
  <div class="all-list-syoukai">
    <div class="syoukaijou-all">
      <div class="syoukaijyou-hyouji">
        <div class="home-body midasi">
          自分の投稿した紹介状
        </div>
        <div class="card-margin">
          <div class="syoukaijou-card">
            @foreach ($post as $post)
            <div class="syou">
              <div class="syoukaijou-sam">
                <div class="preview-syoukaijou-top-sam">
                  <div class="sum-top">
                    <div class="syoukaijou-day-sam">{{$post->create_day}}</div>
                    <div class="syoukaijou-title-sam">{{$post->title}}</div>
                  </div>
                  <div class="janru-area-sam">
                    <div class="janru-tag">
                      {{$post->category_name}}
                    </div>
                    <div class="area-tag">
                      <div class="area-sub">{{$post->municipalities_name}}</div>
                    </div>
                  </div>
                </div>
                <div class="preview-main-sam">
                  <div class="preview-pics-sam">
                    <div class="preview-pic1-sam"><img id="gazo" onclick="changeIMG()" src="/image/noimage.jpg" width="100%" height="100%" border="0" alt=""></div>
                    <div class="preview-pics-sub">
                      <div class="preview-pic2-sam"></div>
                      <div class="preview-pic3-sam"></div>
                      <div class="preview-pic4-sam"></div>
                    </div>
                  </div>
                  <div class="preview-honbun">
                    <div class="honbun-sum">{{$post->body}}</div>
                    <div class="fav_btn" data-syoukaijouId="{{$post->syoukaijou_id}}" data-me="{{Auth::id()}}">
                      <div class="fav_btn-interest">
                        <i class="fas fa-heart 
                        @foreach($interest_list as $item)
                        @if($post->syoukaijou_id == $item->syoukaijou_id)
                         interest-active
                        @endif
                        @endforeach
                        "></i>
                        <div class="interest-count">
                          @foreach($interest_count as $item)
                          @if($item->syoukaijou_id == $post->syoukaijou_id)
                          {{$item->syoukaijou_id_count}}
                          @endif
                          @endforeach
                        </div>
                      </div>

                      <div class="fav-btn-visited">
                        <i class="fas fa-flag 
                        @foreach($visited_list as $item)
                        @if($post->syoukaijou_id == $item->syoukaijou_id)
                        visited-active
                        @endif
                        @endforeach
                        "></i>
                        <div class="visited-math">
                          @foreach($visited_count as $item)
                          @if($item->syoukaijou_id == $post->syoukaijou_id)
                          {{$item->syoukaijou_id_count}}
                          @endif
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div class="syou"></div>
            <div class="syou"></div>
          </div>
        </div>
        <div class="mottomiru"><a href="{{route('home.post.check')}}">もっと見る</a></div>
      </div>
      <div class="syoukaijyou-hyouji">
        <div class="home-body midasi">
          行ってみたい
        </div>
        <div class="card-margin">
          <div class="syoukaijou-card">
            <div class="syou"></div>
            <div class="syou"></div>
            <div class="syou"></div>
          </div>
        </div>
        <div class="mottomiru"><a href="{{route('home.interest.check')}}">もっと見る</a></div>
      </div>
      <div class="syoukaijyou-hyouji">
        <div class="home-body midasi">
          行ったよ
        </div>
        <div class="card-margin">
          <div class="syoukaijou-card">
            <div class="syou"></div>
            <div class="syou"></div>
            <div class="syou"></div>
          </div>
        </div>
        <div class="mottomiru"><a href="{{route('home.visit.check')}}">もっと見る</a></div>
      </div>
      <div class="toukou"><a href="{{route('syoukaijou.create')}}">紹介状作成</a></div>
    </div>
  </div>
</div>


@endsection