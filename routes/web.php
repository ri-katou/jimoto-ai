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
use App\Http\Requests\EditProfile;


Route::get('/', function () {
    return view('index');
});

Route::view('profile/', 'profile');
Route::view('login/', 'Auth/login');
Route::view('syoukaijou/', 'syoukaijou_create');

Route::get('profile/edit/','ProfileController@showProfileEdit')->name('profile.edit');
Route::post('profile/edit/','ProfileController@profileEditCheck');

Route::get('profile/edit/check',function(){
    return view('profile_edit_check');
})->name('profile.edit.check');
Route::post('profile/edit/check','ProfileController@profileEditRegi');

Route::view('create/', 'syoukaijou_create');
Route::view('create/preview', 'preview');
Route::view('syoukaijou', 'syoukaijou_disp');

Route::view('register/', 'Auth/register');

