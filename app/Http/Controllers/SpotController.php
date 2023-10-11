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

    public function serchFilter(Request $request){
        $syoukaijou = '';
        if(isset($request->categoryCheck) and isset($request->municipalitieCheck)){
            $syoukaijou = Syoukaijou::orderBy('syoukaijous.created_at','desc')->join('municipalities','syoukaijous.municipalities_id', '=' ,'municipalities.id')->join('categories','syoukaijous.category_id','=','categories.id')->whereIN('category_id',$request->categoryCheck)->Wherein('municipalities_id',$request->municipalitieCheck)->get();
        } else if(isset($request->categoryCheck)){
            $syoukaijou = Syoukaijou::orderBy('syoukaijous.created_at','desc')->join('municipalities','syoukaijous.municipalities_id', '=' ,'municipalities.id')->join('categories','syoukaijous.category_id','=','categories.id')->whereIN('category_id',$request->categoryCheck)->get();
        } else if(isset($request->municipalitieCheck)){
            $syoukaijou = Syoukaijou::orderBy('syoukaijous.created_at','desc')->join('municipalities','syoukaijous.municipalities_id', '=' ,'municipalities.id')->join('categories','syoukaijous.category_id','=','categories.id')->whereIN('municipalities_id',$request->municipalitieCheck)->get();
        } else {
            $syoukaijou = Syoukaijou::orderBy('syoukaijous.created_at','desc')->join('municipalities','syoukaijous.municipalities_id', '=' ,'municipalities.id')->join('categories','syoukaijous.category_id','=','categories.id')->All();
        };

        $count = count($syoukaijou);
        $categoryConditions = '';
        if(isset($request->categoryCheck)){
            $categoryConditions = category::wherein('id',$request->categoryCheck)->get();
        }
        $municipalitieCondetions = '';
         if($request->municipalitieCheck){
            $municipalitieCondetions = Municipalitie::wherein('id',        $request->municipalitieCheck)->get();
        }

        return view('jimoto_spot_search',compact('syoukaijou','count','categoryConditions','municipalitieCondetions'));
    }

    public function keywordSearch(Request $Request){

        $search = $Request->input('search');

        if ($search) {

            $spaceConversion = mb_convert_kana($search, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            foreach($wordArraySearched as $value) {
                $syoukaijou = Syoukaijou::orderBy('syoukaijous.created_at','desc')->join('municipalities','syoukaijous.municipalities_id', '=' ,'municipalities.id')->join('categories','syoukaijous.category_id','=','categories.id')->where('body', 'like', '%'.$value.'%')->get();
            }
            $search = $wordArraySearched;
        }
        else {
            $syoukaijou = Syoukaijou::orderBy('syoukaijous.created_at','desc')->join('municipalities','syoukaijous.municipalities_id', '=' ,'municipalities.id')->join('categories','syoukaijous.category_id','=','categories.id')->get();
        }

        $count = count($syoukaijou);
        $categoryConditions = '';
        $municipalitieCondetions = '';

        return view('jimoto_spot_search',compact('syoukaijou','search','count','categoryConditions','municipalitieCondetions'));

    }

    public function showDisp(int $id)
    {
        $syoukaijou = Syoukaijou::find($id);
        return view('syoukaijou_disp',compact('syoukaijou'));

    }
}