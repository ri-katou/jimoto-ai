<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Genre;
use App\Area;
use App\Municipalitie;
use Faker\Provider\sv_SE\Municipality;

class SpotController extends Controller
{
    public function showSpotFilter(){
        $meisyo = Category::where('genre_id',3)->get();
        $insyokuten = Category::where('genre_id',1)->get();
        $gurme = Category::where('genre_id',2)->get();
        $event = Category::where('genre_id',5)->get();
        $shop = Category::where('genre_id',6)->get();
        $onsen = Category::where('genre_id',4)->get();

        $center = Municipalitie::where('area_id',3)->get();
        $west = Municipalitie::where('area_id',4)->get();
        $east = Municipalitie::where('area_id',5)->get();
        $agatuma = Municipalitie::where('area_id',2)->get();
        $tonenumata = Municipalitie::where('area_id',1)->get();

        return view('jimoto_spot_filter',compact('meisyo','insyokuten','gurme','event','shop','onsen','center','west','east','agatuma','tonenumata'));
    }
}
