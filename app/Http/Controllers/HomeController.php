<?php

namespace App\Http\Controllers;

use App\category;
use App\Municipalitie;
use App\Syoukaijou;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function test()
    {
        // ユーザー情報に紐づく紹介状情報を取得
        // $post = User::find(Auth::id())->Syoukaijous()->get();

        $post = Auth::user()
            ->join('Syoukaijous', 'users.id', '=', 'Syoukaijous.user_id')
            ->join('municipalities', 'municipalities.id', '=', 'Syoukaijous.municipalities_id')
            ->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
            ->where('users.id', '=', Auth::user()->id)
            ->limit(3)->get();

        // $category_name = Auth::user()
        //     ->join('Syoukaijous', 'users.id', '=', 'Syoukaijous.user_id')
        //     ->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
        //     ->where('users.id', '=', Auth::user()->id)
        //     ->limit(3)->get();

        // dd($post);

        // $areaname = $post->
        // $cityId = Auth::user()->Syoukaijous()->limit(3)->municipalities_id()->get();
        // $cityName = Municipalitie::whereHas('syoukaijous', function ($name) {
        //     //市区町村テーブルのIDと数値が同じ市区町村IDの市区町村を取得
        //     $name->where('id',);
        // })->get();


        return view('home', [
            'syoukai' => $post
        ]);
    }

    public function message()
    {
        $message = Auth::user()
            ->join('Syoukaijous', 'users.id', '=', 'Syoukaijous.user_id')
            ->join('municipalities', 'municipalities.id', '=', 'Syoukaijous.municipalities_id')
            ->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
            ->where('users.id', '=', Auth::user()->id)
            ->get();

        return view('post_all_list', [
            'all_message' => $message
        ]);
    }
}
