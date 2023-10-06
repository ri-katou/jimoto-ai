<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfiles;
use App\Municipalitie;
use Illuminate\Http\Request;
use App\User;
use App\User_detail;
use Illuminate\Support\Facades\Auth;
use App\Syoukaijou;


class ProfileController extends Controller
{
    public function showProfile() {
        $user = Auth::user();
        $municipalitie = User::find(Auth::id())->join('user_details','users.id','=','user_details.user_id')->join('municipalities','user_details.municipalitie_id','=','municipalities.id')->get();

        return view('profile',compact('user','municipalitie'));
    }
    public function showProfileEdit(){
        $user = Auth::user();
        $user_detail = User_detail::where('user_id',Auth::id())->get();
        // dd($user_detail);
        $municipalitie = Municipalitie::find($user_detail[0]['municipalitie_id']);
        $aria_list = Municipalitie::all();
        return view('profile_edit',compact('user','municipalitie','aria_list'));
    }
    public function profileEditCheck(EditProfiles $request){
        return view('profile_edit_check',[
            'input' => $request
        ]);
    }
    public function profileEditRegi(EditProfiles $request){
        $user = Auth::user();
        $user_detail = User_detail::find($user->id);
        $user->name = $request->input('nickname');
        $user->email = $request->input('email');
        $user_detail->aria_id = $request->eria;

        $user->save();
        $user_detail->save();



    }
}
