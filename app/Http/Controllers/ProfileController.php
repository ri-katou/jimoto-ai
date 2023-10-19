<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfiles;
use App\Municipalitie;
use Illuminate\Http\Request;
use App\User;
use App\User_detail;
use Illuminate\Support\Facades\Auth;
use App\Syoukaijou;
use App\category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfile() {
        $user = Auth::user();
        $user_detail = User::select(
            'users.id as users_id',
            'users.name',
            'users.email',
            'user_details.icon_image',
            'municipalities.municipalities_name')
            ->join('user_details','users.id','=','user_details.user_id')->join('municipalities','user_details.municipalitie_id','=','municipalities.id')->where('users.id',Auth::id())->get();

        return view('profile',compact('user','user_detail'));
    }
    public function showProfileEdit(){
        $user = Auth::user();
        $user_detail = User_detail::where('user_id',Auth::id())->get();
        $municipalitie = Municipalitie::find($user_detail[0]['municipalitie_id']);
        $aria_list = Municipalitie::all();
        return view('profile_edit',compact('user','municipalitie','aria_list'));
    }
    public function profileEditCheck(EditProfiles $input){
        $municipalitie = Municipalitie::find($input->input('eria'));
        return view('profile_edit_check',compact('input','municipalitie'));
    }
    public function profileEditRegi(EditProfiles $request){
        DB::beginTransaction();
        $user = Auth::user();
        $user_detail = User_detail::find($user->id);
        $user->name = $request->input('nickname');
        $user->email = $request->input('email');
        $user_detail->municipalitie_id = $request->eria;

        $user->save();
        $user_detail->save();
        DB::commit();
        return redirect()->route('home');

    }
    public function profileEditImg(Request $request){
        DB::beginTransaction();
        $imageName = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('profile', $imageName);
        $path1 = Storage::disk('s3')->putFile('jimotoaiProfile', storage_path( 'app/profile/'.$imageName), 'public');
        $user_detail = User_detail::find(Auth::id());
        $user_detail->icon_image = Storage::disk('s3')->url($path1);
        $user_detail->save();
        
        $oldimage = $request->input('old_image');
        $s3_delete = Storage::disk('s3')->delete($oldimage);
        
        Storage::disk('public')->delete('profile', $imageName);
        DB::commit();

        return redirect()->route('profile');

    }
}
