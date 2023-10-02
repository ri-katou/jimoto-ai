<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSyoukaijou;
use Illuminate\Http\Request;
use App\syoukaijou;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CreateController extends Controller
{
    public function showPreview(CreateSyoukaijou $Request)
    {
        return view('preview', ['input' => $Request]);
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
        $syoukaijou->municipalities_id = $Request->area;
        $syoukaijou->category_id = $Request->janru;
        $syoukaijou->spotname = $Request->spotname;
        $syoukaijou->address = $Request->address;
        $syoukaijou->url = $Request->url;
        $syoukaijou->user_id = Auth::id();
        $syoukaijou->created_at = Carbon::now();
        $syoukaijou->updated_at = Carbon::now();

        $syoukaijou->save();

        return redirect()->route('home');
    }

    // public function __construct()
    // {
    //     $this->genre = new Categories();
    // }

    // public function selectbox(Request $Request)
    // {
    //     $genres = $this->genre->get();
    //     return view('create', compact('genres'));
    // }
}
