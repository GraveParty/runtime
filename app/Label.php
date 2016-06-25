<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public function weibos()
    {
        return $this->belongsToMany('App\Weibo','weibo_id');
    }
}
