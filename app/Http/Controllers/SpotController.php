<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
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
        $categoryConditions = '';
        $municipalitieCondetions = '';

        $syoukaijouAll = Syoukaijou::select(
            'syoukaijous.id as syoukaijous_id',
            'Syoukaijous.title',
            'Syoukaijous.image1',
            'Syoukaijous.image2',
            'Syoukaijous.image3',
            'Syoukaijous.image4',
            'Syoukaijous.spotname',
            'Syoukaijous.address',
            'Syoukaijous.url',
            'Syoukaijous.body',
            'Syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name'
        )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->orderBy('syoukaijous.created_at', 'desc')->get();

        $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();
                $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();
    
                $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();
                $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();

        return view('jimoto_spot', compact('syoukaijouAll', 'categoryConditions', 'municipalitieCondetions','interest_list', 'interest_count','visited_list','visited_count'));
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
        $syoukaijou = '';
        if (isset($request->categoryCheck) and isset($request->municipalitieCheck)) {
            $syoukaijou = Syoukaijou::select(
                'syoukaijous.id as syoukaijous_id',
                'Syoukaijous.title',
                'Syoukaijous.image1',
                'Syoukaijous.image2',
                'Syoukaijous.image3',
                'Syoukaijous.image4',
                'Syoukaijous.spotname',
                'Syoukaijous.address',
                'Syoukaijous.url',
                'Syoukaijous.body',
                'Syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name'
            )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->whereIN('category_id', $request->categoryCheck)->Wherein('municipalities_id', $request->municipalitieCheck)->orderBy('syoukaijous.created_at', 'desc')->get();
        } else if (isset($request->categoryCheck)) {
            $syoukaijou = Syoukaijou::select(
                'syoukaijous.id as syoukaijous_id',
                'Syoukaijous.title',
                'Syoukaijous.image1',
                'Syoukaijous.image2',
                'Syoukaijous.image3',
                'Syoukaijous.image4',
                'Syoukaijous.spotname',
                'Syoukaijous.address',
                'Syoukaijous.url',
                'Syoukaijous.body',
                'Syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name'
            )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->whereIN('category_id', $request->categoryCheck)->orderBy('syoukaijous.created_at', 'desc')->get();
        } else if (isset($request->municipalitieCheck)) {
            $syoukaijou = Syoukaijou::select(
                'syoukaijous.id as syoukaijous_id',
                'Syoukaijous.title',
                'Syoukaijous.image1',
                'Syoukaijous.image2',
                'Syoukaijous.image3',
                'Syoukaijous.image4',
                'Syoukaijous.spotname',
                'Syoukaijous.address',
                'Syoukaijous.url',
                'Syoukaijous.body',
                'Syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name'
            )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->whereIN('municipalities_id', $request->municipalitieCheck)->orderBy('syoukaijous.created_at', 'desc')->get();
        } else {
            $syoukaijou = Syoukaijou::select(
                'syoukaijous.id as syoukaijous_id',
                'Syoukaijous.title',
                'Syoukaijous.image1',
                'Syoukaijous.image2',
                'Syoukaijous.image3',
                'Syoukaijous.image4',
                'Syoukaijous.spotname',
                'Syoukaijous.address',
                'Syoukaijous.url',
                'Syoukaijous.body',
                'Syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name'
            )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->orderBy('syoukaijous.created_at', 'desc')->get();
        };
        $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();
        $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();
    
        $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();
        $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();

        $count = count($syoukaijou);

        $categoryConditions = '';
        if (isset($request->categoryCheck)) {
            $categoryConditions = category::wherein('id', $request->categoryCheck)->get();
        }
        $municipalitieCondetions = '';
        if ($request->municipalitieCheck) {
            $municipalitieCondetions = Municipalitie::wherein('id',        $request->municipalitieCheck)->get();
        }

        return view('jimoto_spot_search', compact('syoukaijou', 'count', 'categoryConditions', 'municipalitieCondetions','interest_list', 'interest_count','visited_list','visited_count'));
    }

    public function keywordSearch(Request $Request)
    {
        $search = $Request->input('search');
            if ($search) {

                $spaceConversion = mb_convert_kana($search, 's');
    
                $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
    
                foreach ($wordArraySearched as $key => $value) {
                    if ($key == 0) {
                        $syoukaijou = Syoukaijou::select(
                            'syoukaijous.id as syoukaijous_id',
                            'Syoukaijous.title',
                            'Syoukaijous.image1',
                            'Syoukaijous.image2',
                            'Syoukaijous.image3',
                            'Syoukaijous.image4',
                            'Syoukaijous.spotname',
                            'Syoukaijous.address',
                            'Syoukaijous.url',
                            'Syoukaijous.body',
                            'Syoukaijous.created_at as create_day',
                            'municipalities.municipalities_name',
                            'category_name'
                        )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->where('body', 'like', '%' . $value . '%')->orderBy('syoukaijous.created_at', 'desc')->get();
                    } else {
                        ${$syoukaijou . $key} = Syoukaijou::select(
                            'syoukaijous.id as syoukaijous_id',
                            'Syoukaijous.title',
                            'Syoukaijous.image1',
                            'Syoukaijous.image2',
                            'Syoukaijous.image3',
                            'Syoukaijous.image4',
                            'Syoukaijous.spotname',
                            'Syoukaijous.address',
                            'Syoukaijous.url',
                            'Syoukaijous.body',
                            'Syoukaijous.created_at as create_day',
                            'municipalities.municipalities_name',
                            'category_name'
                        )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->where('body', 'like', '%' . $value . '%')->orderBy('syoukaijous.created_at', 'desc')->get();
                        $syoukaijou = collect($syoukaijou)->merge(${$syoukaijou . $key});
                    }
                }
                $search = $wordArraySearched;
            } else {
                $syoukaijou = Syoukaijou::select(
                    'syoukaijous.id as syoukaijous_id',
                    'Syoukaijous.title',
                    'Syoukaijous.image1',
                    'Syoukaijous.image2',
                    'Syoukaijous.image3',
                    'Syoukaijous.image4',
                    'Syoukaijous.spotname',
                    'Syoukaijous.address',
                    'Syoukaijous.url',
                    'Syoukaijous.body',
                    'Syoukaijous.created_at as create_day',
                    'municipalities.municipalities_name',
                    'category_name'
                )->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')->join('categories', 'syoukaijous.category_id', '=', 'categories.id')->orderBy('syoukaijous.created_at', 'desc')->get();
            }


            $count = count($syoukaijou);
            $categoryConditions = '';
            $municipalitieCondetions = '';

            $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();
        $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();
    
        $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();
        $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();
    
            return view('jimoto_spot_search', compact('syoukaijou', 'search', 'count', 'categoryConditions', 'municipalitieCondetions','interest_list', 'interest_count','visited_list','visited_count'));

    }

    public function showDisp(int $id)
    {
        $syoukaijou = Syoukaijou::select(
            'syoukaijous.id as syoukaijous_id',
            'Syoukaijous.title',
            'Syoukaijous.image1',
            'Syoukaijous.image2',
            'Syoukaijous.image3',
            'Syoukaijous.image4',
            'Syoukaijous.spotname',
            'Syoukaijous.address',
            'Syoukaijous.url',
            'Syoukaijous.body',
            'Syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name'
        )->join('municipalities', 'municipalities.id', '=', 'Syoukaijous.municipalities_id')->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')->where('syoukaijous.id', '=', $id)->get();


        return view('syoukaijou_disp', compact('syoukaijou'));
    }

    public function spotMap()
    {
        $spot = Syoukaijou::whereNotNull('address')->get();
        return view('jimoto_spot_map', compact('spot'));
    }
}
