@extends('layout')
@section('content')
    <div class="home">
        <div class="syoukaijou-header">
            <div class="home-icon-right">
                <div class="profile-icon"></div>
                <div class="icon-prof link"><a href="{{ route('profile') }}">プロフィール画面へ</a></div>
            </div>
            <div class="home-icon-left">
                <a href="{{route('spot.search')}}">
                <div class="icon-space">
                    <img src="/image/letter.svg" alt="" class="letter-svg">
                    <img src="/image/magnifying-glass.svg" alt="" class="glass-svg">
                    <div class="serch-syoukaijou">
                        紹介状を見つける
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="all-list-syoukai">
            <div class="syoukaijou-all">
                <div class="syoukaijyou-hyouji">
                    <div class="home-body midasi">
                        自分の投稿した紹介状
                    </div>
                    <div class="card-margin">
                        @if (count($post) >= 1)
                        {{-- ここから紹介状１枚 --}}
                            <div class="syoukaijou-card">
                                @foreach ($post as $item)
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
                                                    <div class="preview-pic1-sam"><img id="gazo" onclick="changeIMG()"
                                                            src="/image/noimage.jpg" width="100%" height="100%"
                                                            border="0" alt=""></div>
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
                                                                @foreach ($interest_count as $value)
                                                                    @if ($item->syoukaijous_id == $value->syoukaijou_id)
                                                                        {{ $value->syoukaijou_id_count }}
                                                                        @break
                                                                    @endif
                                                                @endforeach
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
                                                                @foreach ($visited_count as $value)
                                                                    @if ($item->syoukaijous_id == $value->syoukaijou_id)
                                                                        {{$value->syoukaijou_id_count}}
                                                                        @break
                                                                    @endif
                                                                @endforeach
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
                            {{-- ここまで紹介状１枚 --}}
                        @else
                            <div class="dummy">投稿がされていません<br><a href="{{ route('syoukaijou.create') }}">紹介状作成はこちら</a>
                            </div>
                        @endif
                    </div>
                    <div class="mottomiru link"><a href="{{ route('home.post.check') }}">もっと見る</a></div>
                </div>
                <div class="syoukaijyou-hyouji">
                    <div class="home-body midasi">
                        行ってみたい
                    </div>
                    <div class="card-margin">
                        @if (count($interest) >= 1)
                            <div class="syoukaijou-card">
                                @foreach ($interest as $item)
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
                                                    <div class="preview-pic1-sam"><img id="gazo" onclick="changeIMG()"
                                                            src="/image/noimage.jpg" width="100%" height="100%"
                                                            border="0" alt=""></div>
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
                                                                @foreach ($interest_count as $value)
                                                                    @if ($item->syoukaijous_id == $value->syoukaijou_id)
                                                                        {{ $value->syoukaijou_id_count }}
                                                                        @break
                                                                    @endif
                                                                @endforeach
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
                                                            <div class="visited-math">
                                                                @foreach ($visited_count as $value)
                                                                    @if ($item->syoukaijous_id == $value->syoukaijou_id)
                                                                        {{ $value->syoukaijou_id_count }}
                                                                        @break
                                                                    @endif
                                                                @endforeach
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
                        @else
                            <div class="dummy">行ってみたいがありません</div>
                        @endif

                    </div>
                    <div class="mottomiru link"><a href="{{ route('home.interest.check') }}">もっと見る</a></div>
                </div>
                <div class="syoukaijyou-hyouji">
                    <div class="home-body midasi">
                        行ったよ
                    </div>
                    <div class="card-margin">
                        @if (count($visited) >= 1)
                            <div class="syoukaijou-card">
                                @foreach ($visited as $item)
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
                                                    <div class="preview-pic1-sam"><img id="gazo"
                                                            onclick="changeIMG()" src="/image/noimage.jpg" width="100%"
                                                            height="100%" border="0" alt=""></div>
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
                                                                @foreach ($interest_count as $value)
                                                                    @if ($item->syoukaijous_id == $value->syoukaijou_id)
                                                                        {{ $value->syoukaijou_id_count }}
                                                                        @break
                                                                    @endif
                                                                @endforeach
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
                                                            <div class="visited-math">
                                                                @foreach ($visited_count as $value)
                                                                    @if ($item->syoukaijous_id == $value->syoukaijou_id)
                                                                        {{ $value->syoukaijou_id_count }}
                                                                        @break
                                                                    @endif
                                                                @endforeach
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
                        @else
                            <div class="dummy">行ったよ がありません</div>
                        @endif
                    </div>
                    <div class="mottomiru link"><a href="{{ route('home.visit.check') }}">もっと見る</a></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


@endsection