@extends('layout')
@section('content')
    <form action="" method="get">
        <div class="jimoto-search-top">
            <div class="jimoto-search">

                <input type="search" name="search" placeholder="キーワードを入力" size="40">
                <input type="submit" value="検索する">

            </div>
            <select name="example">
                <option>新着順</option>
                <option>行ってみたいが多い順</option>
                <option>訪問済みが多い順</option>
            </select>
        </div>

        <div class="janru-area-search">
            <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}#aria">エリアを指定して探す</a></div>
            <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}#genre">ジャンルを指定して探す</a></div>
            <div class="map-search"><a class="btn-gray" href=#>マップから探す</a></div>
        </div>
        </div>

        <div class="spot-filter-content">
            <div class="spot-filter-content-genre" id="genre">
                <form action="aria.serch" method="GET">
                    <div class="spot-filter-content-genre-title block-green">ジャンル</div>
                    <div class="spot-filter-content-genre-title-container">
                        <div class="spot-filter-content-genre-title-item">
                            <div class="underline-orange">
                                <input type="checkbox" id="meisyo">名所
                            </div>
                            <ul>
                                @foreach ($meisyo as $item)
                                    <li><input type="checkbox" value="{{ $item->category_name }}"
                                            name="{{ $item->category_name }}">{{ $item->category_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="spot-filter-content-genre-title-item">
                            <div class="underline-orange"><input type="checkbox" id="insyokuten">飲食店</div>
                            <ul>
                                @foreach ($insyokuten as $item)
                                    <li><input type="checkbox" value="{{ $item->category_name }}"
                                            name="{{ $item->category_name }}">{{ $item->category_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="spot-filter-content-genre-title-item">
                            <div class="underline-orange"><input type="checkbox" id="gurme">グルメ</div>
                            <ul>
                                @foreach ($gurme as $item)
                                    <li><input type="checkbox" value="{{ $item->category_name }}"
                                            name="{{ $item->category_name }}">{{ $item->category_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="spot-filter-content-genre-title-item">
                            <div class="underline-orange"><input type="checkbox" id="event">イベント</div>
                            <ul>
                                @foreach ($event as $item)
                                    <li><input type="checkbox" value="{{ $item->category_name }}"
                                            name="{{ $item->category_name }}">{{ $item->category_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="spot-filter-content-genre-title-item">
                            <div class="underline-orange"><input type="checkbox" id="shop">お店</div>
                            <ul>
                                @foreach ($shop as $item)
                                    <li><input type="checkbox" value="{{ $item->category_name }}"
                                            name="{{ $item->category_name }}">{{ $item->category_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="spot-filter-content-genre-title-item">
                            <div class="underline-orange"><input type="checkbox" id="onsen">温泉・宿</div>
                            <ul>
                                @foreach ($onsen as $item)
                                    <li><input type="checkbox" value="{{ $item->category_name }}"
                                            name="{{ $item->category_name }}">{{ $item->category_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <input type="submit" value="検索する" class="btn-green">
                </form>
            </div>


            <div class="spot-filter-content-aria" id="aria">
                <div class="spot-filter-content-aria-title block-green">エリア</div>
                {{-- ここに地図がはいる --}}
                <div class="spot-filter-content-aria-title-container">
                    <div class="spot-filter-content-aria-title-item">
                        <div class="underline-pink"><input class="select-item-center" type="checkbox" id="center"
                                class="aria-check area_id_{{ $item->area_id }}">県央</div>
                        <ul>
                            @foreach ($center as $item)
                                <li><input type="checkbox" value="{{ $item->municipalities_name }}"
                                        name="{{ $item->municipalities_name }}"
                                        class="area_id_{{ $item->area_id }}">{{ $item->municipalities_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="spot-filter-content-aria-title-item">
                        <div class="underline-blue"><input type="checkbox" id="west">西部</div>
                        <ul>
                            @foreach ($west as $item)
                                <li><input class="select-item-west" type="checkbox"
                                        value="{{ $item->municipalities_name }}"
                                        name="{{ $item->municipalities_name }}">{{ $item->municipalities_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="spot-filter-content-aria-title-item">
                        <div class="underline-orange"><input class="select-item-east" type="checkbox" id="east">東部
                        </div>
                        <ul>
                            @foreach ($east as $item)
                                <li><input type="checkbox" value="{{ $item->municipalities_name }}"
                                        name="{{ $item->municipalities_name }}">{{ $item->municipalities_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="spot-filter-content-aria-title-item">
                        <div class="underline-green"><input class="select-item-agatuma" type="checkbox"
                                id="agatuma">吾妻</div>
                        <ul>
                            @foreach ($agatuma as $item)
                                <li><input type="checkbox" value="{{ $item->municipalities_name }}"
                                        name="{{ $item->municipalities_name }}">{{ $item->municipalities_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="spot-filter-content-aria-title-item">
                        <div class="underline-purple"><input class="select-item-tonenumata" type="checkbox"
                                id="tonenumata">利根・沼田</div>
                        <ul>
                            @foreach ($tonenumata as $item)
                                <li><input type="checkbox" value="{{ $item->municipalities_name }}"
                                        name="{{ $item->municipalities_name }}">{{ $item->municipalities_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
    </form>
@endsection
