<?php

namespace App\Http\Controllers;

use App\category;
use App\Interest;
use App\Visited;
use App\Municipalitie;
use App\Syoukaijou;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function test()
    {
        // ユーザー情報に紐づく紹介状情報を取得
        // $post = User::find(Auth::id())->Syoukaijous()->get();

        $post = Syoukaijou::select(
            'Syoukaijous.id as syoukaijou_id',
            'Syoukaijous.title',
            'Syoukaijous.image1',
            'Syoukaijous.image2',
            'Syoukaijous.image3',
            'Syoukaijous.image4',
            'Syoukaijous.spotname',
            'Syoukaijous.address',
            'Syoukaijous.url',
            'Syoukaijous.body',
            'Syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name'
        )
            ->join('users', 'syoukaijous.user_id', '=', 'users.id')
            ->join('municipalities', 'Syoukaijous.municipalities_id','=','municipalities.id')
            ->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
            ->where('syoukaijous.user_id', '=', Auth::user()->id)
            ->orderBy('Syoukaijous.created_at', 'desc')
            ->limit(3)->get();

            $interest = Interest::select(
            'interests.user_id as interest_user_id',
            'Syoukaijous.id as syoukaijou_id',
            'Syoukaijous.title',
            'Syoukaijous.image1',
            'Syoukaijous.image2',
            'Syoukaijous.image3',
            'Syoukaijous.image4',
            'Syoukaijous.spotname',
            'Syoukaijous.address',
            'Syoukaijous.url',
            'Syoukaijous.body',
            'Syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name')->join('Syoukaijous', 'interests.syoukaijou_id', '=', 'Syoukaijous.id')->join('municipalities', 'municipalities.id', '=', 'Syoukaijous.municipalities_id')->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
            ->where('interests.user_id', '=', Auth::id())->orderBy('Syoukaijous.created_at', 'desc')
            ->limit(3)
            ->get();

            $visited = Visited::select(
                'visiteds.user_id as visited_user_id',
                'Syoukaijous.id as syoukaijou_id',
                'Syoukaijous.title',
                'Syoukaijous.image1',
                'Syoukaijous.image2',
                'Syoukaijous.image3',
                'Syoukaijous.image4',
                'Syoukaijous.spotname',
                'Syoukaijous.address',
                'Syoukaijous.url',
                'Syoukaijous.body',
                'Syoukaijous.created_at as create_day',
                'municipalities.municipalities_name',
                'category_name')->join('Syoukaijous', 'visiteds.syoukaijou_id', '=', 'Syoukaijous.id')->join('municipalities', 'municipalities.id', '=', 'Syoukaijous.municipalities_id')->join('categories', 'categories.id', '=', 'Syoukaijous.category_id')
                ->where('visiteds.user_id', '=', Auth::id())->orderBy('Syoukaijous.created_at', 'desc')
                ->limit(3)
                ->get();

                $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();
                $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();
    
                $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();
                $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();

        return view('home', compact('post','interest','interest_list', 'interest_count','visited','visited_list','visited_count'));
    }

    public function postAll()
    {
        $postAll = Syoukaijou::select(
            'Syoukaijous.id as syoukaijou_id',
            'Syoukaijous.title',
            'Syoukaijous.image1',
            'Syoukaijous.image2',
            'Syoukaijous.image3',
            'Syoukaijous.image4',
            'Syoukaijous.spotname',
            'Syoukaijous.address',
            'Syoukaijous.url',
            'Syoukaijous.body',
            'Syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name'
        )
            ->join('Users','Syoukaijous.user_id' , '=', 'users.id')
            ->join('municipalities', 'Syoukaijous.municipalities_id', '=','municipalities.id' )
            ->join('categories', 'Syoukaijous.category_id', '=', 'categories.id')
            ->where('syoukaijous.user_id', '=', Auth::id())
            ->orderBy('Syoukaijous.created_at', 'desc')
            ->get();

            $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();
            $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();

            $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();
            $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();

        return view('post_all_list', compact('postAll','interest_list', 'interest_count','visited_list','visited_count'));
    }

    public function interestAll()
    {
        $interestAll = Interest::select(
            'Syoukaijous.id as syoukaijou_id',
            'Syoukaijous.title',
            'Syoukaijous.image1',
            'Syoukaijous.image2',
            'Syoukaijous.image3',
            'Syoukaijous.image4',
            'Syoukaijous.spotname',
            'Syoukaijous.address',
            'Syoukaijous.url',
            'Syoukaijous.body',
            'Syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name'
        )->rightJoin('syoukaijous','interests.syoukaijou_id', '=','syoukaijous.id')
            ->join('Users','Syoukaijous.user_id' , '=', 'users.id')
            ->join('municipalities', 'Syoukaijous.municipalities_id', '=','municipalities.id' )
            ->join('categories', 'Syoukaijous.category_id', '=', 'categories.id')
            ->where('interests.user_id', '=', Auth::id())
            ->orderBy('Syoukaijous.created_at', 'desc')
            ->get();

            $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();
            $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();

            $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();
            $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();

        return view('interest_all_list',compact('interestAll','interest_list', 'interest_count','visited_list','visited_count'));
    }

    public function visitedAll()
    {
        $visitedAll = Visited::select(
            'Syoukaijous.id as syoukaijou_id',
            'Syoukaijous.title',
            'Syoukaijous.image1',
            'Syoukaijous.image2',
            'Syoukaijous.image3',
            'Syoukaijous.image4',
            'Syoukaijous.spotname',
            'Syoukaijous.address',
            'Syoukaijous.url',
            'Syoukaijous.body',
            'Syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name'
        )->rightJoin('syoukaijous','visiteds.syoukaijou_id', '=','syoukaijous.id')
            ->join('Users','Syoukaijous.user_id' , '=', 'users.id')
            ->join('municipalities', 'Syoukaijous.municipalities_id', '=','municipalities.id' )
            ->join('categories', 'Syoukaijous.category_id', '=', 'categories.id')
            ->where('visiteds.user_id', '=', Auth::id())
            ->orderBy('Syoukaijous.created_at', 'desc')
            ->get();

            $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();
            $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();

            $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();
            $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS syoukaijou_id_count'))->groupBy('syoukaijou_id')->get();

        return view('interest_all_list',compact('visitedAll','interest_list', 'interest_count','visited_list','visited_count'));
    }
}
