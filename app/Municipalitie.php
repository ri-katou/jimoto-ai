<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipalitie extends Model
{
    protected $table = 'municipalities';

    // 地域一つに紹介状が多数紐づいている
    public function syoukaijous()
    {
        return $this->hasMany('App\Syoukaijous');
    }
}
