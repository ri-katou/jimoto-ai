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

Route::get('/', function () {
    return view('index');
});

// Auth::routes();
Route::view('profile/', 'profile');
Route::view('home/', 'home');
Route::view('login/', 'Auth/login');
Route::view('syoukaijou/', 'syoukaijou_create');

Route::view('register', 'Auth/register');
