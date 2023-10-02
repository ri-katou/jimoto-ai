<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipalitie extends Model
{
    public function user_detailes(){
        return $this->hasMany('App\User_detaile');
    }
}
