<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function municipalities()
    {
        return $this->hasMany('App\Municipalitie');
    }
}
