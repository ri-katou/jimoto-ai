<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSyoukaijou;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function showPreview(CreateSyoukaijou $Request)
    {
        return view('preview',['input' => $Request]);
    }

        public function create(Request $Request) {
            $param = [
                'title' => $Request->title,
                'main' => $Request->main,
                'spotname' => $Request->spotname,
                'address' => $Request->address,
                'url' => $Request->url
            ];
            DB::insert('insert into syoukaijous (title, body, spotname, address, url, ) values (NOW())', $param);
            return redirect('/');
        }
}
