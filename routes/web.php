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

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditProfile;


Route::get('/', function () {
    return view('index');
});


Route::get('user/area_select/', 'UserEriaContoroller@index');

Route::post('register/check/', 'UserController@showRegisterCheck');

Auth::routes();

Route::view('home/', 'home');


Route::get('profile/', function(){
    return view('profile');
})->name('profile');

Route::view('syoukaijou/', 'syoukaijou_create');

Route::get('profile/edit/', 'ProfileController@showProfileEdit')->name('profile.edit');
Route::post('profile/edit/', 'ProfileController@profileEditCheck');

Route::get('profile/edit/check',function(){
    return view('profile_edit_check');
})->name('profile.edit.check');
Route::post('profile/edit/check','ProfileController@profileEditRegi');

Route::get('user/delete/',function(){
    return view('user_delete');
});

Route::view('create/', 'syoukaijou_create');
Route::view('create/preview', 'preview');
Route::view('syoukaijou', 'syoukaijou_disp');
Route::view('jimoto_spot', 'jimoto_spot');
