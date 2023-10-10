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
Route::post('register/check/', 'UserController@showRegisterCheck')->name('register.check');

Route::group(['middleware' => 'auth'], function () {
    Route::get('user/area_select/', 'UserEriaContoroller@index');
    Route::post('user/area_select/', 'UserEriaContoroller@areaChoice')->name('area.select');

    Route::get('home/', 'HomeController@test')->name('home');

    Route::get('home/post/list', 'HomeController@message')->name('home.post.check');

    Route::get('home/interest/list/', 'HomeController@interest')->name('home.interest.check');

    Route::get('home/visited/list/', 'HomeController@visited')->name('home.visit.check');

    Route::get('profile/', 'ProfileController@showProfile')->name('profile');

    Route::get('profile/edit/', 'ProfileController@showProfileEdit')->name('profile.edit');
    Route::post('profile/edit/', 'ProfileController@profileEditCheck');

    Route::get('profile/edit/check', function () {
        return view('profile_edit_check');
    })->name('profile.edit.check');
    Route::post('profile/edit/check', 'ProfileController@profileEditRegi');

    Route::get('user/delete/', function () {
        return view('user_delete');
    })->name('user.delete');
    Route::post('user/delete', 'UserController@userDelete');


    Route::get('create/', 'CreateController@showCreate')->name('syoukaijou.create');
    Route::post('create/', 'CreateController@showPreview')->name('preview.edit');
    Route::post('create/preview/', 'CreateController@create')->name('create');





    Route::post('jimoto_spot/serch','SpotController@serchFilter')->name('spot.serch');





    Route::get('jimoto_spot/','SpotController@showSpot')->name('spot.search');
    Route::get('jimoto_spot/search/','spotController@keywordSearch')->name('keyword.search');

    Route::get('jimoto_spot/filter/', 'SpotController@showSpotFilter')->name('spot.filter');


});


