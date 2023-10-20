@extends('layout')
@section('content')
<div class="jimoto-search-top">
    <div class="jimoto-search">
        <form action="{{ route('keyword.search') }}" method="get" class="serchForm container">
            <input type="text" name="search" placeholder="キーワードを入力">
            <input type="submit" value="検索" name="sourtNew">
        </form>
    </div>
    <select class="sourtselect" name="example">
        <option value="sourtNew">新着順</option>
        <option value="sourtInterest">行ってみたいが多い順</option>
        <option value="sourtVisited">訪問済みが多い順</option>
    </select>
</div>
@if($errors->any())
        <div class="error-message">
            <ul>
                @error('search')
                <li>{{ $message }}</li>
                @enderror
            </ul>
        </div>
        @endif

<div class="janru-area-search">
    <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}#aria">エリアを指定して探す</a></div>
    <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}">ジャンルを指定して探す</a></div>
    <div class="map-search"><a class="btn-gray" href="{{ route('spot.map') }}">マップから探す</a></div>
</div>


<div class="search-title">検索条件</div>
        <div class="if-keyword-area-janru">
            @if ($search)
            <div class="if-keyword">キーワード：
            @foreach($search as $item)
                {{ $item }}
                @endforeach
            </div>
            @else
                <div class="if-janru">ジャンル：
                    @if ($categoryConditions)
                        @foreach ($categoryConditions as $item)
                            <span class="serch-Condtions">{{ $item->category_name }}</span>
                        @endforeach
                    @else
                        <span>指定なし</span>
                    @endif
                </div>
                <div class="if-area">エリア：
                    @if ($municipalitieCondetions)
                        @foreach ($municipalitieCondetions as $item)
                            <span class="serch-Condtions">{{ $item->municipalities_name }}</span>
                        @endforeach
                    @else
                        <span>指定なし</span>
                    @endif
                </div>
            @endif
            <div class="search-disp">検索結果：{{ $syoukaijou->total() }}件</div>

</div>
</div>
<div class="jimoto-spot-content">
    {{-- ここから紹介状１枚 --}}
    <div class="syoukaijou-card">
        @foreach ($syoukaijou as $item)
        <div class="syou" data-id="{{ $item->syoukaijous_id }}" data-interest="{{ $item->interest_count ?: 0 }}" data-visited="{{ $item->visited_count ?: 0 }}">
            <div class="syoukaijou-sam">
                <a class="syoukaijou-link" href="{{ route('syoukaijou.disp', ['id' => $item->syoukaijous_id]) }}">

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
                            <div class="preview-pic1-sam"><img src="{{ $item->image1 }}"></div>
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
    {{-- ここまで紹介状1枚 --}}
</div>
<div class="pagenate">
    {{ $syoukaijou->links() }}
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
        console.log($myId);
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