<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSyoukaijou;
use Illuminate\Http\Request;
use App\syoukaijou;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Municipalitie;
use App\Categorie;


class CreateController extends Controller
{
    public function showPreview(CreateSyoukaijou $Request)
    {
        $categorie = Categorie::where('id', $Request->categorie)->get();
        $municipalitie = Municipalitie::where('id', $Request->municipalitie)->get();
        return view('preview', compact('categorie','Request','municipalitie'));
    }


    public function create(Request $Request)
    {
        $syoukaijou = new Syoukaijou();
        $syoukaijou->title = $Request->title;
        $syoukaijou->body = $Request->main;
        $syoukaijou->image1 = $Request->image1;
        $syoukaijou->image2 = $Request->image2;
        $syoukaijou->image3 = $Request->image3;
        $syoukaijou->image4 = $Request->image4;
        $syoukaijou->municipalities_id = $Request->municipalitie;
        $syoukaijou->category_id = $Request->categorie;
        $syoukaijou->spotname = $Request->spotname;
        $syoukaijou->address = $Request->address;
        $syoukaijou->url = $Request->url;
        $syoukaijou->user_id = Auth::id();
        $syoukaijou->created_at = Carbon::now();
        $syoukaijou->updated_at = Carbon::now();

        $syoukaijou->save();

        return redirect()->route('home');
    }


    public function showCreate()
    {
        $municipalitie = Municipalitie::all();
        $categorie = Categorie::all();

        return view('syoukaijou_create', compact('municipalitie','categorie'));

    }
    
}