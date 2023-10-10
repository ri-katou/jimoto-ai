<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\Syoukaijou;
use App\Genre;
use App\Area;
use App\Municipalitie;


class SpotController extends Controller
{

    public function showSpot(){

        $syoukaijou = Syoukaijou::orderBy('syoukaijous.created_at','desc')->join('municipalities','syoukaijous.municipalities_id', '=' ,'municipalities.id')->join('categories','syoukaijous.category_id','=','categories.id')->get();

        return view ('jimoto_spot',compact('syoukaijou'));
    }
    
    public function showSpotFilter(){
        $meisyo = category::where('genre_id',3)->get();
        $insyokuten = category::where('genre_id',1)->get();
        $gurme = category::where('genre_id',2)->get();
        $event = category::where('genre_id',5)->get();
        $shop = category::where('genre_id',6)->get();
        $onsen = category::where('genre_id',4)->get();

        $center = Municipalitie::where('area_id',3)->get();
        $west = Municipalitie::where('area_id',4)->get();
        $east = Municipalitie::where('area_id',5)->get();
        $agatuma = Municipalitie::where('area_id',2)->get();
        $tonenumata = Municipalitie::where('area_id',1)->get();

        return view('jimoto_spot_filter',compact('meisyo','insyokuten','gurme','event','shop','onsen','center','west','east','agatuma','tonenumata'));
    }

    public function keywordSearch(Request $Request)
    {

        $syoukaijous = Syoukaijou::orderBy('syoukaijous.created_at','desc')->join('municipalities','syoukaijous.municipalities_id', '=' ,'municipalities.id')->join('categories','syoukaijous.category_id','=','categories.id')->paginate(20);

        /*$count = \App\Syoukaijou::where('body','search')->count();*/

        $search = $Request->input('search');

        $query = Syoukaijou::query();

        if ($search) {

            $spaceConversion = mb_convert_kana($search, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            foreach($wordArraySearched as $value) {
                $query->where('body', 'like', '%'.$value.'%');
            }

            $syoukaijous = $query->paginate(20);

        }

        return view('jimoto_spot_search')
            ->with([
                'syoukaijous' => $syoukaijous,
                'search' => $search,
                /*'count' => $count,*/
            ]);
    
            

    }
}