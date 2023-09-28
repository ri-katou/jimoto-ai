<?php

namespace App\Http\Controllers;

use App\Area;
use App\Municipalitie;
use Illuminate\Http\Request;


class UserEriaContoroller extends Controller
{
    public function index()
    {
        // すべての市区町村を取得する
        // Area::find(1)->municipalities()->get();
        $tone_numata = Area::find(1)->municipalities()->get();
        $agatuma = Area::find(2)->municipalities()->get();
        $kenou = Area::find(3)->municipalities()->get();
        $seibu = Area::find(4)->municipalities()->get();
        $toubu = Area::find(5)->municipalities()->get();
        // foreach ($tone_numata as $numatacity) {
        //     echo $numatacity->municipalities;
        // }

        return view('area_select', [
            'tone_numata' => $tone_numata,
            'agatuma' => $agatuma,
            'kenou' => $kenou,
            'seibu' => $seibu,
            'toubu' => $toubu,
        ]);
    }

    public function areaChoice(Request $request)
    {
        $area = $request->input('area');
    }
}
