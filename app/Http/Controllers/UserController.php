<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegister;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showRegisterCheck(UserRegister $request)
    {
        $nickname = $request->input('name');
        $email = $request->input('email');
        $pass = $request->input('password');
        return view('auth/register_check', compact('nickname', 'email', 'pass'));
    }
}
