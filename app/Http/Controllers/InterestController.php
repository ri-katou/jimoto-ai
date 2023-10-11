<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use Illuminate\Support\Carbon;

class InterestController extends Controller
{
    public function interestAjax(Request $request){
        $interest = new Interest();
        $interest->user_id = $request->user_id;
        $interest->syoukaijou_id = $request->syoukaijou_id;
        $interest->created_at = Carbon::now();
        $interest->updated_at = Carbon::now();

        $interest->save();

        $fav_falg = 0 ;

        
    }
}
