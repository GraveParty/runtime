<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weibo extends Model
{
    public function labels()
    {
        return $this->belongsToMany('App\Label','label_id');
    }
}