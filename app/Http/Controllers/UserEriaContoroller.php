<?php

namespace App\Http\Controllers;

use App\Area;
use App\User;
use App\User_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $detail = new User_detail();
        // データベース接続

        $detail->user_id = Auth::id();
        $detail->municipalitie_id = intval($request->input('area_choice'));
        $detail->created_at = Carbon::now();
        $detail->updated_at = Carbon::now();
        // データベースに保存
        $detail->save();
        // 登録が完了したらリダイレクト
        return
            redirect()->route('home');
    }
}
