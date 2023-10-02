<?php

namespace App\Http\Controllers;

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

        $post = Auth::user()->Syoukaijous()->limit(3)->get();

        return view('home', [
            'syoukai' => $post
        ]);
    }
}
