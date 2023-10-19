<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSyoukaijou;
use Illuminate\Http\Request;
use App\syoukaijou;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Municipalitie;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Storage;
use App\User_detail;
use Illuminate\Support\Facades\DB;


class CreateController extends Controller
{
    public function showPreview(CreateSyoukaijou $Request)
    {
        $file_name1 = $Request->file('image1')->getClientOriginalName();
        $file_name2 = $Request->file('image2');
        $file_name3 = $Request->file('image3');
        $file_name4 = $Request->file('image4');

        $file_name1 = 'storage/' . $file_name1;

        $Request->file('image1')->storeAs('public/storage', $file_name1);
        $file_name1 = 'storage/' . $file_name1;

       if(is_null($file_name2)){
        $imagePath2 = '/image/';
        $file_name2 = 'noimage.jpg';
       } else {
        $imagePath2 = 'storage/';
        $file_name2 = $Request->file('image2')->getClientOriginalName();
        $Request->file('image2')->storeAs('public/storage', $file_name2);
       };

       if(is_null($file_name3)){
        $imagePath3 = '/image/';
        $file_name3 = 'noimage.jpg';
       } else {
        $imagePath3 = 'storage/';
        $file_name3 = $Request->file('image3')->getClientOriginalName();
        $Request->file('image3')->storeAs('public/storage', $file_name3);
       };

       if(is_null($file_name4)){
        $imagePath4 = '/image/';
        $file_name4 = 'noimage.jpg';
       } else {
        $imagePath4 = 'storage/';
        $file_name4 = $Request->file('image4')->getClientOriginalName();
        $Request->file('image4')->storeAs('public/storage', $file_name4);
       };


        $category = Category::where('id', $Request->category)->first();
        $municipalitie = Municipalitie::where('id', $Request->municipalitie)->first();
        $day = Carbon::now();
        return view('preview', compact('category', 'Request', 'municipalitie', 'day','file_name1','file_name2','file_name3','file_name4', 'imagePath2','imagePath3','imagePath4'));
    }


    public function create(Request $Request)
    {

         //s3アップロード開始
        $image1 = $Request->image1;
        $image2 = $Request->image2;
        $image3 = $Request->image3;
        $image4 = $Request->image4;

        // バケットの`jimotoaiImage`フォルダへアップロード


        $path1 = Storage::disk('s3')->putFile('jimotoaiImage', storage_path( 'app/public/'.$image1), 'public');

        $path2 = $image2;
        $path3 = $image3;
        $path4 = $image4;

        if($image2 !== '/image/noimage.jpg'){
            $path2 = Storage::disk('s3')->putFile('jimotoaiImage', storage_path('app/public/'. $image2), 'public');
            $path2 = Storage::disk('s3')->url($path2);
        };

        if($image3 !== '/image/noimage.jpg'){
            $path3 = Storage::disk('s3')->putFile('jimotoaiImage', storage_path('app/public/'. $image3), 'public');
            $path3 = Storage::disk('s3')->url($path3);
        };

        if($image4 !== '/image/noimage.jpg'){
            $path4 = Storage::disk('s3')->putFile('jimotoaiImage', storage_path('app/public/'. $image4), 'public');
            $path4 = Storage::disk('s3')->url($path4);
        };

        $syoukaijou = new Syoukaijou();
        $syoukaijou->title = $Request->title;
        $syoukaijou->body = $Request->main;
        $syoukaijou->image1 = Storage::disk('s3')->url($path1);  // アップロードした画像のフルパスを取得
        $syoukaijou->image2 = $path2;
        $syoukaijou->image3 = $path3;
        $syoukaijou->image4 = $path4;
        $syoukaijou->municipalities_id = intval($Request->municipalitie);
        $syoukaijou->category_id = intval($Request->category);
        $syoukaijou->spotname = $Request->spotname;
        $syoukaijou->address = $Request->address;
        $syoukaijou->url = $Request->url;
        $syoukaijou->user_id = Auth::id();
        $syoukaijou->created_at = Carbon::now();
        $syoukaijou->updated_at = Carbon::now();

        $syoukaijou->save();

        return redirect()->route('home');
    }


    public function showCreate()
    {
        $userdetail = User_detail::select('user_details.municipalitie_id','municipalities.municipalities_name')->join('users','user_details.user_id','=','users.id')->join('municipalities','user_details.municipalitie_id','=','municipalities.id')->where('user_details.user_id',Auth::id())->get();
        $municipalitie = Municipalitie::all();
        $category = Category::all();

        return view('syoukaijou_create', compact('userdetail','municipalitie', 'category'));
    }
    public function delete(int $id)
    {
        $syoukaijou = Syoukaijou::find($id);

        if(Auth::id() === $syoukaijou->user_id){
        DB::beginTransaction();
        Syoukaijou::find($id)->delete();
        DB::commit();
        return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
    }
}
