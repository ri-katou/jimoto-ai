<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpotSearch;
use Illuminate\Http\Request;
use App\Category;
use App\Syoukaijou;
use App\Genre;
use App\Area;
use App\Municipalitie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Interest;
use App\Visited;
use Illuminate\Support\Facades\DB;

class SpotController extends Controller
{

    public function showSpot()
    {
        $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS interest_count'))->groupBy('syoukaijou_id');
        $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS visited_count'))->groupBy('syoukaijou_id');

        $syoukaijouAll = Syoukaijou::select(
            'syoukaijous.id as syoukaijous_id',
            'syoukaijous.title',
            'syoukaijous.image1',
            'syoukaijous.image2',
            'syoukaijous.image3',
            'syoukaijous.image4',
            'syoukaijous.spotname',
            'syoukaijous.address',
            'syoukaijous.url',
            'syoukaijous.body',
            'syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name',
            'interest_count.interest_count',
            'visited_count.visited_count'
        )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')->orderBy('syoukaijous.created_at', 'desc')->paginate(9);
        $syoukaijouAll->create_day = str_replace('-','/',$syoukaijouAll->create_day);
        dd($syoukaijouAll->create_day);

        $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get(); //ユーザーの行ってみたい一覧
        $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get(); //ユーザーの行ったよ一覧

        return view('jimoto_spot', compact('syoukaijouAll', 'interest_list', 'visited_list',));
    }

    public function showSpotFilter()
    {
        $meisyo = category::where('genre_id', 3)->get();
        $insyokuten = category::where('genre_id', 1)->get();
        $gurme = category::where('genre_id', 2)->get();
        $event = category::where('genre_id', 5)->get();
        $shop = category::where('genre_id', 6)->get();
        $onsen = category::where('genre_id', 4)->get();

        $center = Municipalitie::where('area_id', 3)->get();
        $west = Municipalitie::where('area_id', 4)->get();
        $east = Municipalitie::where('area_id', 5)->get();
        $agatuma = Municipalitie::where('area_id', 2)->get();
        $tonenumata = Municipalitie::where('area_id', 1)->get();

        return view('jimoto_spot_filter', compact('meisyo', 'insyokuten', 'gurme', 'event', 'shop', 'onsen', 'center', 'west', 'east', 'agatuma', 'tonenumata'));
    }


    public function serchFilter(Request $request)
    {
        $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS interest_count'))->groupBy('syoukaijou_id');
        $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS visited_count'))->groupBy('syoukaijou_id');
        $syoukaijou = '';
        if (isset($request->categoryCheck) and isset($request->municipalitieCheck)) {
            $syoukaijou = Syoukaijou::select(
                'syoukaijous.id as syoukaijous_id',
                'syoukaijous.title',
                'syoukaijous.image1',
                'syoukaijous.image2',
                'syoukaijous.image3',
                'syoukaijous.image4',
                'syoukaijous.spotname',
                'syoukaijous.address',
                'syoukaijous.url',
                'syoukaijous.body',
                'syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name',
                'interest_count.interest_count',
                'visited_count.visited_count'
            )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')->whereIN('category_id', $request->categoryCheck)->Wherein('municipalities_id', $request->municipalitieCheck)->orderBy('syoukaijous.created_at', 'desc')->paginate(9);
        } else if (isset($request->categoryCheck)) {
            $syoukaijou = Syoukaijou::select(
                'syoukaijous.id as syoukaijous_id',
                'syoukaijous.title',
                'syoukaijous.image1',
                'syoukaijous.image2',
                'syoukaijous.image3',
                'syoukaijous.image4',
                'syoukaijous.spotname',
                'syoukaijous.address',
                'syoukaijous.url',
                'syoukaijous.body',
                'syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name',
                'interest_count.interest_count',
                'visited_count.visited_count'
            )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')->whereIN('category_id', $request->categoryCheck)->orderBy('syoukaijous.created_at', 'desc')->paginate(9);
        } else if (isset($request->municipalitieCheck)) {
            $syoukaijou = Syoukaijou::select(
                'syoukaijous.id as syoukaijous_id',
                'syoukaijous.title',
                'syoukaijous.image1',
                'syoukaijous.image2',
                'syoukaijous.image3',
                'syoukaijous.image4',
                'syoukaijous.spotname',
                'syoukaijous.address',
                'syoukaijous.url',
                'syoukaijous.body',
                'syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name',
                'interest_count.interest_count',
                'visited_count.visited_count'
            )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')->whereIN('municipalities_id', $request->municipalitieCheck)->orderBy('syoukaijous.created_at', 'desc')->paginate(9);
        } else {
            $syoukaijou = Syoukaijou::select(
                'syoukaijous.id as syoukaijous_id',
                'syoukaijous.title',
                'syoukaijous.image1',
                'syoukaijous.image2',
                'syoukaijous.image3',
                'syoukaijous.image4',
                'syoukaijous.spotname',
                'syoukaijous.address',
                'syoukaijous.url',
                'syoukaijous.body',
                'syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name',
                'interest_count.interest_count',
                'visited_count.visited_count'
            )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')->orderBy('syoukaijous.created_at', 'desc')->paginate(9);

        };
        $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();

        $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();

        $count = count($syoukaijou);
        $search = '';
        //選択された市区町村とカテゴリを取得
        $categoryConditions = '';
        if (isset($request->categoryCheck)) {
            $categoryConditions = category::wherein('id', $request->categoryCheck)->get();
        }
        $municipalitieCondetions = '';
        if ($request->municipalitieCheck) {
            $municipalitieCondetions = Municipalitie::wherein('id', $request->municipalitieCheck)->get();
        }

        return view('jimoto_spot_search', compact('syoukaijou', 'count', 'categoryConditions', 'municipalitieCondetions', 'interest_list', 'visited_list', 'search'));
    }

    public function keywordSearch(SpotSearch $Request)
    {
        $search = $Request->input('search');

        if (isset($search)) {

            $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS interest_count'))->groupBy('syoukaijou_id');
            $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS visited_count'))->groupBy('syoukaijou_id');

            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            if (empty($wordArraySearched)) {
                $syoukaijou = Syoukaijou::select(
                    'syoukaijous.id as syoukaijous_id',
                    'syoukaijous.title',
                    'syoukaijous.image1',
                    'syoukaijous.image2',
                    'syoukaijous.image3',
                    'syoukaijous.image4',
                    'syoukaijous.spotname',
                    'syoukaijous.address',
                    'syoukaijous.url',
                    'syoukaijous.body',
                    'syoukaijous.created_at as create_day',
                    'municipalities.municipalities_name',
                    'category_name',
                    'interest_count.interest_count',
                    'visited_count.visited_count'
                )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')->orderBy('syoukaijous.created_at', 'desc')->paginate(9);
            } else {

                foreach ($wordArraySearched as $key => $value) {
                    if ($key == 0) {
                        $syoukaijou = Syoukaijou::select(
                            'syoukaijous.id as syoukaijous_id',
                            'syoukaijous.title',
                            'syoukaijous.image1',
                            'syoukaijous.image2',
                            'syoukaijous.image3',
                            'syoukaijous.image4',
                            'syoukaijous.spotname',
                            'syoukaijous.address',
                            'syoukaijous.url',
                            'syoukaijous.body',
                            'syoukaijous.created_at as create_day',
                            'municipalities.municipalities_name',
                            'category_name',
                            'interest_count.interest_count',
                            'visited_count.visited_count'
                        )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')->where('body', 'like', "%$value%")->orWhere('title', 'like', "%$value%")->orderBy('syoukaijous.created_at', 'desc')->paginate(9);
                    } else {
                        ${$syoukaijou . $key} = Syoukaijou::select(
                            'syoukaijous.id as syoukaijous_id',
                            'syoukaijous.title',
                            'syoukaijous.image1',
                            'syoukaijous.image2',
                            'syoukaijous.image3',
                            'syoukaijous.image4',
                            'syoukaijous.spotname',
                            'syoukaijous.address',
                            'syoukaijous.url',
                            'syoukaijous.body',
                            'syoukaijous.created_at as create_day',
                            'municipalities.municipalities_name',
                            'category_name',
                            'interest_count.interest_count',
                            'visited_count.visited_count'
                        )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')->where('body', 'like', "%$value%")->orWhere('title', 'like', "%$value%")->orderBy('syoukaijous.created_at', 'desc')->paginate(9);
                        $syoukaijou = collect($syoukaijou)->merge(${$syoukaijou . $key});
                    }
                }
            }

            $search = $wordArraySearched;
        } else {
            $search = '';
            $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS interest_count'))->groupBy('syoukaijou_id');
            $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS visited_count'))->groupBy('syoukaijou_id');
            $syoukaijou = Syoukaijou::select(
                'syoukaijous.id as syoukaijous_id',
                'syoukaijous.title',
                'syoukaijous.image1',
                'syoukaijous.image2',
                'syoukaijous.image3',
                'syoukaijous.image4',
                'syoukaijous.spotname',
                'syoukaijous.address',
                'syoukaijous.url',
                'syoukaijous.body',
                'syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name',
                'interest_count.interest_count',
                'visited_count.visited_count'
            )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')->orderBy('syoukaijous.created_at', 'desc')->paginate(9);
        }

        $count = count($syoukaijou);
        $categoryConditions = '';
        $municipalitieCondetions = '';

        $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();
        $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();

        return view('jimoto_spot_search', compact('syoukaijou', 'search', 'count', 'categoryConditions', 'municipalitieCondetions', 'interest_list', 'visited_list'));
    }

    public function showDisp(int $id)
    {
        $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS interest_count'))->groupBy('syoukaijou_id');
        $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS visited_count'))->groupBy('syoukaijou_id');
        $syoukaijou = Syoukaijou::select(
            'syoukaijous.id as syoukaijous_id',
            'syoukaijous.user_id as creater_id',
            'syoukaijous.title',
            'syoukaijous.image1',
            'syoukaijous.image2',
            'syoukaijous.image3',
            'syoukaijous.image4',
            'syoukaijous.spotname',
            'syoukaijous.address',
            'syoukaijous.url',
            'syoukaijous.body',
            'syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name',
            'interest_count.interest_count',
            'visited_count.visited_count'
        )
            ->join('municipalities', 'municipalities.id', '=', 'syoukaijous.municipalities_id')
            ->join('categories', 'categories.id', '=', 'syoukaijous.category_id')
            ->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')
            ->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')
            ->where('syoukaijous.id', '=', $id)->paginate(9);


        return view('syoukaijou_disp', compact('syoukaijou'));
    }

    public function spotMap()
    {
        $spot = Syoukaijou::whereNotNull('address')->get();
        return view('jimoto_spot_map', compact('spot'));
    }
}
