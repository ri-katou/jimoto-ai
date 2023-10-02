<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfiles;
use App\Municipalitie;
use Illuminate\Http\Request;
use App\User;
use App\User_detail;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function showProfile(User_detail $user_detail) {
        $user = Auth::user();
        $municipalitie = $user_detail;
        // Municipalitie::find($user_detail->municipalitie_id)->get();
        return view('profile',compact('user','municipalitie'));
    }
    public function showProfileEdit(){
        $user = Auth::user();
        $user_detail = User_detail::where('user_id',Auth::id())->get();
        $municipalitie = Municipalitie::find($user_detail);
        return view('profile_edit',compact('user','municipalitie'));
    }
    public function profileEditCheck(EditProfiles $request){
        return view('profile_edit_check',[
            'input' => $request
        ]);
    }
    public function profileEditRegi(EditProfiles $request){
        $user = Auth::user();
        $user_detail = User_detail::find($user->id);
        $user->name = $request->nickname;
        $user->email = $request->email;
        $user_detail->aria_id = $request->eria;

        $user->save();
        $user_detail->save();

    }
}
