<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfile;
use Illuminate\Http\Request;
use App\User;
use App\User_detail;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfileEdit(){
        return view('profile_edit');
    }
    public function profileEditCheck(EditProfile $request){
        return view('profile_edit_check',[
            'input' => $request
        ]);
    }
    public function profileEditRegi(EditProfile $request){
        $user = Auth::user();
        $user_detail = User_detail::find($user->id);
        $user->name = $request->nickname;
        $user->email = $request->email;
        $user_detail->aria_id = $request->eria;

        $user->save();
        $user_detail->save();

    }
}
