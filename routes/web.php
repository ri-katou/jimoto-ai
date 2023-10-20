<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\SpotController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditProfile;

Auth::routes();

Route::get('/', function () {
    return view('index');
});
Route::get('register/check/', function () {
    return view('register_check');
})->name('register.check');
Route::post('register/check/', 'UserController@showRegisterCheck')->name('register.check');

Route::group(['middleware' => 'auth'], function () {
    // ユーザー周り
    Route::get('user/area_select/', 'UserEriaContoroller@index');
    Route::post('user/area_select/', 'UserEriaContoroller@areaChoice')->name('area.select');

    Route::get('user/delete/', function () {
        return view('user_delete');
    })->name('user.delete');
    Route::post('user/delete', 'UserController@userDelete');

    // 紹介状一覧系
    Route::get('home/', 'HomeController@test')->name('home');

    Route::get('home/post/list', 'HomeController@postALL')->name('home.post.check'); //自分の過去投稿
    Route::get('home/interest/list/', 'HomeController@interestAll')->name('home.interest.check'); //行ってみたい
    Route::get('home/visited/list/', 'HomeController@visitedAll')->name('home.visit.check'); //行ったよ

    // プロフィール、プロフィール編集
    Route::get('profile/', 'ProfileController@showProfile')->name('profile');

    Route::get('profile/edit/', 'ProfileController@showProfileEdit')->name('profile.edit');
    Route::post('profile/edit/', 'ProfileController@profileEditCheck');
    Route::get('profile/edit/check', function () {
        return view('profile_edit_check');
    })->name('profile.edit.check');
    Route::post('profile/edit/check', 'ProfileController@profileEditRegi');
    Route::post('profile/image/edit', 'ProfileController@profileEditImg')->name('edit.image');

    // 紹介状作成
    Route::get('create/', 'CreateController@showCreate')->name('syoukaijou.create'); //作成画面へのリンク
    Route::post('create/', 'CreateController@showPreview')->name('preview.edit'); //プレビューの表示（入力の送信)
    Route::post('create/preview/', 'CreateController@create')->name('create'); //紹介状のDB登録
    Route::get('syoukaijou/delete/{id}', 'CreateController@delete')->name('syoukaijou.delete');

    // 発見
    Route::get('jimoto_spot/', 'SpotController@showSpot')->name('spot.search');
    Route::get('syoukaijou/{id}', 'SpotController@showDisp')->name('syoukaijou.disp');
    Route::get('jimoto_spot/filter/', 'SpotController@showSpotFilter')->name('spot.filter'); //エリア、ジャンル検索画面
    Route::get('jimoto_spot/search/', 'spotController@keywordSearch')->name('keyword.search'); //キーワード検索の結果
    Route::post('jimoto_spot/serch', 'SpotController@serchFilter')->name('spot.serch'); //エリア、ジャンル絞り込みの結果
    Route::get('jimoto_spot/map/', 'SpotController@spotMap')->name('spot.map'); //マップ検索画面


    //行ってみたい
    Route::post('/interest', 'InterestController@interestAjax')->name('interest');
    //行っったよ
    Route::post('/visited', 'visitedController@visitedAjax')->name('visited');
});
