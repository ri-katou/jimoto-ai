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
}
