<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfileEdit(){
        return view('profile_edit');
    }
    public function ProfileEditCeck(EditProfile $request){
        return view('profile_edit_check',
        ['input' => $request ]);
    }
}
