<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Syoukaijou extends Model
{
    // protected $table = 'syoukaijous';
    use SoftDeletes;
}
