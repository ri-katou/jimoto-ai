@extends('layout')
@section('content')
    <div class="jimoto-search-top">
        <div class="jimoto-search">
            <form class="keywordserch" action="{{ route('keyword.search') }}" method="get">
                <input type="search" name="search" placeholder="キーワードを入力" size="40">
                <input type="submit" value="検索する" name="sourtNew">
            </form>
        </div>
        <select class="sourtselect" name="example">
            <option value="sourtNew">新着順</option>
            <option value="sourtInterest">行ってみたいが多い順</option>
            <option value="sourtVisited">訪問済みが多い順</option>
        </select>
    </div>

    <div class="janru-area-search">
        <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}#aria">エリアを指定して探す</a></div>
        <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}">ジャンルを指定して探す</a></div>
        <div class="map-search"><a class="btn-gray" href="{{ route('spot.map') }}">マップから探す</a></div>
    </div>



        <div class="search-title">検索条件</div>
        <div class="if-keyword-area-janru">
            @if ($search)
                <div class="if-keyword">キーワード：{{ $search }}</div>
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
            <div class="search-disp">検索結果：{{ $count }}件</div>

        </div>
    </div>
    <div class="jimoto-spot-content">
        {{-- ここから紹介状１枚 --}}
        <div class="syoukaijou-card">
            @foreach ($syoukaijou as $item)
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

                                <div class="preview-main-sam">
                                    <div class="preview-pics-sam">
                                        <div class="preview-pic1-sam"><img id="gazo" src="{{$item->image1}}"></div>

                                    </div>
                                </div>
                                <div class="preview-honbun">
                                    <div class="honbun-sum">{{ $item->body }}</div>
                                    <div class="fav_btn" id="{{ $item->syoukaijous_id }}" data-me="{{ Auth::id() }}">
                                        <div class="fav_btn-interest">
                                            <i
                                                class="fav_btn-interest-icon fas fa-heart 
@foreach ($interest_list as $value)
@if ($item->syoukaijous_id == $value->syoukaijou_id)
 interest-active
@endif @endforeach
"></i>
                                            <div class="interest-count">
                                                {{ $item->interest_count }}
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
                                                {{ $item->visited_count }}
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


@endsection
