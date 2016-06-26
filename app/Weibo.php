<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weibo extends Model
{
    public function labels()
    {
        return $this->belongsToMany('App\Label','weibo_labels')->withTimestamps();
    }



    public function collectors(){

        return $this->belongsToMany('App\User','weibo_collects','weibo_id','collector_id')->withTimestamps();
    }

    public function authoredBy(){
        return $this->belongsTo('App\User','author_id','id');
    }
}
