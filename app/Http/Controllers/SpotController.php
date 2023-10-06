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
        $syoukaijou = Syoukaijou::all();
        $municipalitie = Municipalitie::all();
        $category = Category::all();

        $syoukaijou = Syoukaijou::orderBy('created_at','desc')->get();

        return view ('jimoto_spot',compact('syoukaijou','municipalitie','category'));
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
            $syoukaijou = Syoukaijou::whereIN('category_id',$request->categoryCheck)->Wherein('municipalities_id',$request->municipalitieCheck)->get();
        } else if(isset($request->categoryCheck)){
            $syoukaijou = Syoukaijou::whereIN('category_id',$request->categoryCheck)->get();
        } else if(isset($request->municipalitieCheck)){
            $syoukaijou = Syoukaijou::whereIN('municipalities_id',$request->municipalitieCheck)->get();
        } else {
            $syoukaijou = Syoukaijou::All();
        };

        $count = count($syoukaijou);
        $categoryConditions = '';
        if(isset($request->categoryCheck)){
            category::wherein('id',$request->categoryCheck)->get();
        }
        $municipalitieCondetions = '';
         if($request->municipalitieCheck)
            {Municipalitie::wherein('id',        $request->municipalitieCheck)->get();
        }


        return view('jimoto_spot_search',compact('syoukaijou','count','categoryConditions','municipalitieCondetions'));
    }
}