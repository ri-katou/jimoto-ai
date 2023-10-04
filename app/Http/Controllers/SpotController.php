<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Syoukaijou;
use App\Municipalitie;
use App\category;
use Faker\Provider\sv_SE\Municipality;

class SpotController extends Controller
{
    public function showSpot(){
        $syoukaijou = Syoukaijou::all();
        $municipalitie = Municipalitie::all();
        $category = Category::all();

        $syoukaijou = Syoukaijou::orderBy('created_at','desc')->get();

        return view ('jimoto_spot',compact('syoukaijou','municipalitie','category'));
    }
}
