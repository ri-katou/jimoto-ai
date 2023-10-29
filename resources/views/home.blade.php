@extends('layout')
@section('content')

<div class="home">
    <div class="syoukaijou-header">
        <div class="home-icon-right">
            <div class="profile-icon">
                <img src="{{ isset(\App\User_detail::select('icon_image')->where('user_id', Auth::id())->first()->icon_image)? \App\User_detail::select('icon_image')->where('user_id', Auth::id())->first()->icon_image: 'https://jimotoai2023.s3.ap-northeast-1.amazonaws.com/jimotoaiprofile/cgj35n6IhyLz3mbaMJ3kt0EfsRtP1yuIJhDDJ9XP.jpg' }}" alt="myimage" class="profile-icon-img">
            </div>
            <div class="icon-prof link"><a href="{{ route('profile') }}">プロフィール画面へ</a></div>
        </div>
        <div class="home-icon-left">
            <a href="{{ route('spot.search') }}">
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
</div>
<div class="all-list-syoukai">
    <div class="syoukaijou-all">
        <div class="syoukaijyou-hyouji">
            <div class="home-body midasi block-green yu-sei">

                &nbsp;自分の投稿した紹介状
            </div>
            @if (count($post) >= 1)
            {{-- ここから紹介状１枚 --}}
            <div class="syoukaijou-card">
                @foreach ($post as $item)
                <div class="syou">
                    <div class="syoukaijou-sam">
                        <a class="syoukaijou-link" href="{{ route('syoukaijou.disp', ['id' => $item->syoukaijous_id]) }}">
                            <div class="preview-syoukaijou-top-sam">
                                <div class="sum-top">
                                    <div class="syoukaijou-day-sam">{{ $item->create_day }}</div>
                                    <div class="syoukaijou-title-sam underline-green">{{ $item->title }}</div>
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
                                    <div class="preview-pic1-sam"><img id="gazo" src="{{ $item->image1 }}"></div>
                                    <div class="preview-pics-sub">
                                        <div class="preview-pic2-sam"></div>
                                        <div class="preview-pic3-sam"></div>
                                        <div class="preview-pic4-sam"></div>
                                    </div>
                                </div>
                                <div class="preview-honbun">
                                    <div class="honbun-sum">{{ $item->body }}</div>

                                </div>
                            </div>
                        </a>
                        <div class="fav_btn" id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}">
                            <div class="fav_btn-interest">
                                <i onclick="interest(this)" data-id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}" class="fav_btn-interest-icon fas fa-heart 
                            @foreach ($interest_list as $value)
                            @if ($item->syoukaijous_id == $value->syoukaijou_id)
                            interest-active
                            @endif @endforeach"></i>
                                <div class="interest-count">
                                    {{ $item->interest_count }}
                                </div>
                            </div>

                            <div class="fav-btn-visited">
                                <i onclick="visited(this)" data-id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}" class="fav_btn-visited-icon fas fa-flag 
                            @foreach ($visited_list as $value)
                            @if ($item->syoukaijous_id == $value->syoukaijou_id)
                            visited-active
                            @endif @endforeach
                            "></i>
                                <div class="visited-count">
                                    {{ $item->visited_count }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            {{-- ここまで紹介状１枚 --}}
            <div class="mottomiru link"><a href="{{route('home.post.check')}}">もっと見る</a></div>
            @else
            <div class="dummy">投稿がされていません<br><a href="{{ route('syoukaijou.create') }}">紹介状作成はこちら</a>
            </div>
            @endif
        </div>

        <div class="syoukaijyou-hyouji">
            <div class="home-body midasi block-green yu-sei">
                &nbsp;行ってみたい
            </div>
            @if (count($interest) >= 1)
            <div class="syoukaijou-card">
                @foreach ($interest as $item)
                <div class="syou">
                    <div class="syoukaijou-sam">
                        <a class="syoukaijou-link" href="{{ route('syoukaijou.disp', ['id' => $item->syoukaijous_id]) }}">
                            <div class="preview-syoukaijou-top-sam">
                                <div class="sum-top">
                                    <div class="syoukaijou-day-sam">{{ $item->create_day }}</div>
                                    <div class="syoukaijou-title-sam underline-green">{{ $item->title }}</div>
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
                                    <div class="preview-pic1-sam"><img id="gazo" src="{{ $item->image1 }}"></div>
                                    <div class="preview-pics-sub">
                                        <div class="preview-pic2-sam"></div>
                                        <div class="preview-pic3-sam"></div>
                                        <div class="preview-pic4-sam"></div>
                                    </div>
                                </div>
                                <div class="preview-honbun">
                                    <div class="honbun-sum">{{ $item->body }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="fav_btn" id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}">
                            <div class="fav_btn-interest">
                                <i onclick="interest(this)" data-id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}" class="fav_btn-interest-icon fas fa-heart 
                                @foreach ($interest_list as $value)
                                @if ($item->syoukaijous_id == $value->syoukaijou_id)
                                interest-active
                                @endif @endforeach"></i>
                                <div class="interest-count">
                                    {{ $item->interest_count }}
                                </div>
                            </div>

                            <div class="fav-btn-visited">
                                <i onclick="visited(this)" data-id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}" class="fav_btn-visited-icon fas fa-flag 
                                @foreach ($visited_list as $value)
                                @if ($item->syoukaijous_id == $value->syoukaijou_id)
                                visited-active
                                @endif @endforeach
                                "></i>
                                <div class="visited-count">
                                    {{ $item->visited_count }}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                @endforeach
            </div>
            <div class="mottomiru link"><a href="{{route('home.interest.check')}}">もっと見る</a></div>
            @else
            <div class="dummy">みんなの紹介状を見て自分の行ってみたいを探してみよう！<br><br>
                <div class="dammy-link"><a href="{{route('spot.search')}}">紹介状</a>はこちら</div>
            </div>
            @endif

        </div>

        <div class="syoukaijyou-hyouji">
            <div class="home-body midasi block-green yu-sei">
                &nbsp;行ったよ
            </div>
            @if (count($visited) >= 1)
            <div class="syoukaijou-card">
                @foreach ($visited as $item)
                <div class="syou">
                    <div class="syoukaijou-sam">
                        <a class="syoukaijou-link" href="{{ route('syoukaijou.disp', ['id' => $item->syoukaijous_id]) }}">
                            <div class="preview-syoukaijou-top-sam">
                                <div class="sum-top">
                                    <div class="syoukaijou-day-sam">{{ $item->create_day }}</div>
                                    <div class="syoukaijou-title-sam underline-green">{{ $item->title }}</div>
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
                                    <div class="preview-pic1-sam"><img id="gazo" src="{{ $item->image1 }}"></div>
                                    <div class="preview-pics-sub">
                                        <div class="preview-pic2-sam"></div>
                                        <div class="preview-pic3-sam"></div>
                                        <div class="preview-pic4-sam"></div>
                                    </div>
                                </div>
                                <div class="preview-honbun">
                                    <div class="honbun-sum">{{ $item->body }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="fav_btn" id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}">
                            <div class="fav_btn-interest">
                                <i onclick="interest(this)" data-id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}" class="fav_btn-interest-icon fas fa-heart 
                        @foreach ($interest_list as $value)
                        @if ($item->syoukaijous_id == $value->syoukaijou_id)
                        interest-active
                        @endif @endforeach"></i>
                                <div class="interest-count">
                                    {{ $item->interest_count }}
                                </div>
                            </div>

                            <div class="fav-btn-visited">
                                <i onclick="visited(this)" data-id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}" class="fav_btn-visited-icon fas fa-flag 
                        @foreach ($visited_list as $value)
                        @if ($item->syoukaijous_id == $value->syoukaijou_id)
                        visited-active
                        @endif @endforeach
                        "></i>
                                <div class="visited-count">
                                    {{ $item->visited_count }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mottomiru link"><a href="{{route('home.visit.check')}}">もっと見る</a></div>
            @else
            <div class="dummy">みんなの紹介状を見て自分の行ってみたいを探してみよう！<br><br>
                <div class="dammy-link"><a href="{{route('spot.search')}}">紹介状</a>はこちら</div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    // 行ってみたいボタン
    function interest(icon) {
        let $interestIcon = icon;
        var origin = location.origin;
        var $syoukaijouId = $interestIcon.dataset.id;
        var $myId = $interestIcon.dataset.me;
        console.log($myId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content")
            },
        });
        $.ajax({
            url: origin + "/interest ",
            type: 'post',
            data: {
                'syoukaijou_id': $syoukaijouId,
                'user_id': $myId,
            },
            success: function(data) {
                if (data == 1) {
                    $interestIcon.classList.add('interest-active');
                    let countNow = Number($interestIcon.nextElementSibling.textContent);
                    $interestIcon.nextElementSibling.textContent = countNow + 1;
                } else {
                    $interestIcon.classList.remove('interest-active');
                    let countNow = Number($interestIcon.nextElementSibling.textContent);
                    $interestIcon.nextElementSibling.textContent = countNow - 1;
                }
            }
        });
        return false;
    }
    // 行ったよボタン
    function visited(icon) {
        let $visitedIcon = icon;
        var origin = location.origin;
        var $syoukaijouId = $visitedIcon.dataset.id;
        var $myId = $visitedIcon.dataset.me;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content")
            },
        });
        $.ajax({
            url: origin + "/visited ",
            type: 'post',
            data: {
                'syoukaijou_id': $syoukaijouId,
                'user_id': $myId,
            },
            success: function(data) {
                if (data == 1) {

                    $visitedIcon.classList.add('visited-active');
                    let countNow = Number($visitedIcon.nextElementSibling.textContent);
                    $visitedIcon.nextElementSibling.textContent = countNow + 1;
                } else {
                    $visitedIcon.classList.remove('visited-active');
                    let countNow = Number($visitedIcon.nextElementSibling.textContent);
                    $visitedIcon.nextElementSibling.textContent = countNow - 1;
                }
            }
        });
        return false;
    }
</script>
@endsection