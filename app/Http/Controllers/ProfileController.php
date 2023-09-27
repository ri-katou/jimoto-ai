<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfile;
use Illuminate\Http\Request;
use App\User;
use App\User_detail;

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
        $user = new User();
        $user_detail = new User_detail();
        $user->name = $request->nickname;
        $user->email = $request->email;
        $user_detail->aria_id = $request->eria;

        $user->save();
        $user_detail->save();

    }
}
