@extends('layout')
@section('content')
<div class="jimoto-search-top">
    <div class="jimoto-search">
        <form action="{{ route('keyword.search') }}" method="get">
            <input type="search" name="search" placeholder="キーワードを入力" size="40">
            <input type="submit" value="検索する">
        </form>
    </div>
    <select name="example">
        <option>新着順</option>
        <option>行ってみたいが多い順</option>
        <option>訪問済みが多い順</option>
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
    <div class="janru-search"><a class="btn-gray" href="{{ route('spot.filter') }}#genre">ジャンルを指定して探す</a></div>
    <div class="map-search"><a class="btn-gray" href="{{ route('spot.map') }}">マップから探す</a></div>
</div>

<form action="{{ route('spot.serch') }}" method="POST">
    @csrf
    <div class="spot-filter-content">

        <div class="spot-filter-content-genre" id="genre">

            <div class="spot-filter-content-genre-title block-green">ジャンル</div>
            <div class="spot-filter-content-genre-title-container">
                <div class="spot-filter-content-genre-title-item">
                    <label>
                        <div class="underline-orange check">
                            <input type="checkbox" id="meisyo" name="genre-check[]" value="名所">名所
                        </div>
                    </label>
                    <ul class="spot-filter-category-meisyo">
                        @foreach ($meisyo as $item)
                        <label>
                            <li><input type="checkbox" value="{{ $item->id }}" name="categoryCheck[]">{{ $item->category_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
                <div class="spot-filter-content-genre-title-item">
                    <label>
                        <div class="underline-orange check">
                            <input type="checkbox" id="insyokuten" name="genre-check[]" value="飲食店">飲食店
                        </div>
                    </label>
                    <ul class="spot-filter-category-insyokuten">
                        @foreach ($insyokuten as $item)
                        <label>
                            <li><input type="checkbox" value="{{ $item->id }}" name="categoryCheck[]">{{ $item->category_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
                <div class="spot-filter-content-genre-title-item">
                    <label>
                        <div class="underline-orange check">
                            <input type="checkbox" id="gurme" name="genre-check[]" value="名所">グルメ
                        </div>
                    </label>
                    <ul class="spot-filter-category-gurme">
                        @foreach ($gurme as $item)
                        <label>
                            <li><input type="checkbox" value="{{ $item->id }}" name="categoryCheck[]">{{ $item->category_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
                <div class="spot-filter-content-genre-title-item">
                    <label>
                        <div class="underline-orange check">
                            <input type="checkbox" id="event" name="genre-check[]" value="イベント">イベント
                        </div>
                    </label>
                    <ul class="spot-filter-category-event">
                        @foreach ($event as $item)
                        <label>
                            <li><input type="checkbox" value="{{ $item->id }}" name="categoryCheck[]">{{ $item->category_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
                <div class="spot-filter-content-genre-title-item">
                    <label>
                        <div class="underline-orange check">
                            <input type="checkbox" id="shop" name="genre-check[]" value="お店">お店
                        </div>
                    </label>
                    <ul class="spot-filter-category-shop">
                        @foreach ($shop as $item)
                        <label>
                            <li><input type="checkbox" value="{{ $item->id }}" name="categoryCheck[]">{{ $item->category_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
                <div class="spot-filter-content-genre-title-item">
                    <label>
                        <div class="underline-orange check">
                            <input type="checkbox" id="onsen" name="genre-check[]" value="温泉・宿">温泉・宿
                        </div>
                    </label>
                    <ul class="spot-filter-category-onsen">
                        @foreach ($onsen as $item)
                        <label>
                            <li><input type="checkbox" value="{{ $item->id }}" name="categoryCheck[]">{{ $item->category_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
            </div>
            <input type="submit" value="検索する" class="btn-green spot-filter-genre-submit">
        </div>


        <div class="spot-filter-content-aria" id="aria">
            <div class="spot-filter-content-aria-title block-green">エリア</div>
            {{-- ここに地図がはいる --}}
            <div class="spot-filter-content-aria-title-container">
                <div class="spot-filter-content-aria-title-item">
                    <label>
                        <div class="underline-pink check"><input class="select-item-center" type="checkbox" id="center" value="県央" name="area-check[]">県央</div>
                    </label>
                    <ul>
                        @foreach ($center as $item)
                        <label>
                            <li><input type="checkbox" value="{{ $item->id }}" name="municipalitieCheck[]">{{ $item->municipalities_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
                <div class="spot-filter-content-aria-title-item">
                    <label>
                        <div class="underline-blue check"><input type="checkbox" id="west" value="西部" name="area-check[]">西部</div>
                    </label>
                    <ul>
                        @foreach ($west as $item)
                        <label>
                            <li><input class="select-item-west" type="checkbox" value="{{ $item->id }}" name="municipalitieCheck[]">{{ $item->municipalities_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
                <div class="spot-filter-content-aria-title-item">
                    <label>
                        <div class="underline-orange check"><input class="select-item-east" type="checkbox" id="east" value="東部" name="area-check[]">東部
                        </div>
                    </label>
                    <ul>
                        @foreach ($east as $item)
                        <label>
                            <li><input type="checkbox" value="{{ $item->id }}" name="municipalitieCheck[]">{{ $item->municipalities_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
                <div class="spot-filter-content-aria-title-item">
                    <label>
                        <div class="underline-green check"><input class="select-item-agatuma" type="checkbox" id="agatuma" value="吾妻" name="area-check[]">吾妻</div>
                    </label>
                    <ul>
                        @foreach ($agatuma as $item)
                        <label>
                            <li><input type="checkbox" value="{{ $item->id }}" name="municipalitieCheck[]">{{ $item->municipalities_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
                <div class="spot-filter-content-aria-title-item">
                    <label>
                        <div class="underline-purple check"><input class="select-item-tonenumata" type="checkbox" id="tonenumata" value="利根・沼田" name="area-check[]">利根・沼田</div>
                    </label>
                    <ul>
                        @foreach ($tonenumata as $item)
                        <label>
                            <li><input type="checkbox" value="{{ $item->id }}" name="municipalitieCheck[]">{{ $item->municipalities_name }}</li>
                        </label>
                        @endforeach
                    </ul>
                </div>
            </div>
            <input type="submit" value="検索する" class="btn-green spot-filter-genre-submit">

        </div>

    </div>
</form>
@endsection