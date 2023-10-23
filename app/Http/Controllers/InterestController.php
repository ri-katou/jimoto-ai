<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class InterestController extends Controller
{
    public function interestAjax(Request $request)
    {

        DB::beginTransaction();

        $rec = Interest::where('user_id', $request->input('user_id'))->where('syoukaijou_id', $request->syoukaijou_id)->get();
        $fav_falg = 0;

        if ($rec->isEmpty()) {
            $interest = new Interest();
            $interest->user_id = $request->input('user_id');
            $interest->syoukaijou_id = $request->input('syoukaijou_id');
            $interest->created_at = Carbon::now();
            $interest->updated_at = Carbon::now();

            $interest->save();
            $fav_falg = 1;
        } else {
            $interest = Interest::where('user_id', $request->user_id)->where('syoukaijou_id', $request->syoukaijou_id)->delete();

            $interest->save();
            $fav_falg = 0;
        }
        DB::commit();
        return response()->json($fav_falg);
    }
}
