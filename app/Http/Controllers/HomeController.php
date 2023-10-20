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
        // $post = User::find(Auth::id())->syoukaijous()->get();
        $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS interest_count'))->groupBy('syoukaijou_id');
        $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS visited_count'))->groupBy('syoukaijou_id');
        $post = Syoukaijou::select(
            'syoukaijous.id as syoukaijous_id',
            'syoukaijous.title',
            'syoukaijous.image1',
            'syoukaijous.image2',
            'syoukaijous.image3',
            'syoukaijous.image4',
            'syoukaijous.spotname',
            'syoukaijous.address',
            'syoukaijous.url',
            'syoukaijous.body',
            'syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name',
            'interest_count.interest_count',
            'visited_count.visited_count'
        )
            ->join('users', 'syoukaijous.user_id', '=', 'users.id')
            ->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')
            ->join('categories', 'categories.id', '=', 'syoukaijous.category_id')
            ->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')
            ->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')
            ->where('syoukaijous.user_id', '=', Auth::user()->id)
            ->orderBy('syoukaijous.created_at', 'desc')
            ->limit(3)->get();

        $interest = Interest::select(
            'interests.user_id as interest_user_id',
            'syoukaijous.id as syoukaijous_id',
            'syoukaijous.title',
            'syoukaijous.image1',
            'syoukaijous.image2',
            'syoukaijous.image3',
            'syoukaijous.image4',
            'syoukaijous.spotname',
            'syoukaijous.address',
            'syoukaijous.url',
            'syoukaijous.body',
            'syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name',
            'interest_count.interest_count',
            'visited_count.visited_count'
        )
            ->join('syoukaijous', 'interests.syoukaijou_id', '=', 'syoukaijous.id')
            ->join('municipalities', 'municipalities.id', '=', 'syoukaijous.municipalities_id')
            ->join('categories', 'categories.id', '=', 'syoukaijous.category_id')
            ->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')
            ->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')
            ->where('interests.user_id', '=', Auth::id())->orderBy('syoukaijous.created_at', 'desc')
            ->limit(3)
            ->get();

        $visited = Visited::select(
            'visiteds.user_id as visited_user_id',
            'syoukaijous.id as syoukaijous_id',
            'syoukaijous.title',
            'syoukaijous.image1',
            'syoukaijous.image2',
            'syoukaijous.image3',
            'syoukaijous.image4',
            'syoukaijous.spotname',
            'syoukaijous.address',
            'syoukaijous.url',
            'syoukaijous.body',
            'syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name',
            'interest_count.interest_count',
            'visited_count.visited_count'
        )
            ->join('syoukaijous', 'visiteds.syoukaijou_id', '=', 'syoukaijous.id')
            ->join('municipalities', 'municipalities.id', '=', 'syoukaijous.municipalities_id')
            ->join('categories', 'categories.id', '=', 'syoukaijous.category_id')
            ->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')
            ->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')
            ->where('visiteds.user_id', '=', Auth::id())
            ->orderBy('syoukaijous.created_at', 'desc')
            ->limit(3)
            ->get();

        $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();

        $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();

        return view('home', compact('post', 'interest', 'interest_list', 'visited', 'visited_list'));
    }

    public function postAll()
    {
        $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS interest_count'))->groupBy('syoukaijou_id');
        $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS visited_count'))->groupBy('syoukaijou_id');
        $postAll = Syoukaijou::select(
            'syoukaijous.id as syoukaijous_id',
            'syoukaijous.title',
            'syoukaijous.image1',
            'syoukaijous.image2',
            'syoukaijous.image3',
            'syoukaijous.image4',
            'syoukaijous.spotname',
            'syoukaijous.address',
            'syoukaijous.url',
            'syoukaijous.body',
            'syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name',
            'interest_count.interest_count',
            'visited_count.visited_count'
        )
            ->join('Users', 'syoukaijous.user_id', '=', 'users.id')
            ->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')
            ->join('categories', 'syoukaijous.category_id', '=', 'categories.id')
            ->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')
            ->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')
            ->where('syoukaijous.user_id', '=', Auth::id())
            ->orderBy('syoukaijous.created_at', 'desc')
            ->paginate(9);

        $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();

        $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();


        return view('post_all_list', compact('postAll', 'interest_list', 'visited_list'));
    }

    public function interestAll()
    {
        $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS interest_count'))->groupBy('syoukaijou_id');
        $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS visited_count'))->groupBy('syoukaijou_id');
        $interestAll = Interest::select(
            'syoukaijous.id as syoukaijous_id',
            'syoukaijous.title',
            'syoukaijous.image1',
            'syoukaijous.image2',
            'syoukaijous.image3',
            'syoukaijous.image4',
            'syoukaijous.spotname',
            'syoukaijous.address',
            'syoukaijous.url',
            'syoukaijous.body',
            'syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name',
            'interest_count.interest_count',
            'visited_count.visited_count'
        )->rightJoin('syoukaijous', 'interests.syoukaijou_id', '=', 'syoukaijous.id')
            ->join('Users', 'syoukaijous.user_id', '=', 'users.id')
            ->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')
            ->join('categories', 'syoukaijous.category_id', '=', 'categories.id')
            ->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')
            ->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')
            ->where('interests.user_id', '=', Auth::id())
            ->orderBy('syoukaijous.created_at', 'desc')
            ->paginate(9);

        $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();

        $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();

        return view('interest_all_list', compact('interestAll', 'interest_list', 'visited_list'));
    }

    public function visitedAll()
    {
        $interest_count = Interest::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS interest_count'))->groupBy('syoukaijou_id');
        $visited_count = Visited::select(DB::raw('syoukaijou_id , COUNT(syoukaijou_id) AS visited_count'))->groupBy('syoukaijou_id');
        $visitedAll = Visited::select(
            'syoukaijous.id as syoukaijous_id',
            'syoukaijous.title',
            'syoukaijous.image1',
            'syoukaijous.image2',
            'syoukaijous.image3',
            'syoukaijous.image4',
            'syoukaijous.spotname',
            'syoukaijous.address',
            'syoukaijous.url',
            'syoukaijous.body',
            'syoukaijous.created_at as create_day',
            'municipalities.municipalities_name',
            'category_name',
            'interest_count.interest_count',
            'visited_count.visited_count'
        )->rightJoin('syoukaijous', 'visiteds.syoukaijou_id', '=', 'syoukaijous.id')
            ->join('Users', 'syoukaijous.user_id', '=', 'users.id')
            ->join('municipalities', 'syoukaijous.municipalities_id', '=', 'municipalities.id')
            ->join('categories', 'syoukaijous.category_id', '=', 'categories.id')
            ->leftJoin(DB::raw("({$interest_count->toSql()}) as interest_count"), 'syoukaijous.id', '=', 'interest_count.syoukaijou_id')
            ->leftJoin(DB::raw("({$visited_count->toSql()}) as visited_count"), 'syoukaijous.id', '=', 'visited_count.syoukaijou_id')
            ->where('visiteds.user_id', '=', Auth::id())
            ->orderBy('syoukaijous.created_at', 'desc')
            ->paginate(9);

        $interest_list = Interest::select('syoukaijou_id')->where('user_id', Auth::id())->get();

        $visited_list = Visited::select('syoukaijou_id')->where('user_id', Auth::id())->get();

        return view('visited_all_list', compact('visitedAll', 'interest_list', 'visited_list'));
    }
}


