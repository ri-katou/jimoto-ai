<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    // カテゴリー（小項目）つに紹介状が多数紐づいている
    public function syoukaijou()
    {
        return $this->hasMany('App\Syoukaijous');
    }
}
