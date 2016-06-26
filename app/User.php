<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    
//     $table->increments('id');
//     $table->string('nickname');
//     $table->string('password', 60);
//     $table->string('email')->unique();
//     $table->string('tel');
//     $table->string('sex');
//     $table->integer('type'); //0用户，1教练，2医生
//     $table->rememberToken();
//     $table->timestamps();
    




    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password','nickname', 'tel','sex','type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    
//     protected $rules = [
//     		            'email' => $data['email'],
//     		            'password' => bcrypt($data['password']),
//     		        	'nickname' => $data['name'],
//     		        	'tel' => $data['tel'],
//     		        	'sex' => $data['sex'],
//     		        	'type' => $data['type'],
//     ];



    public function collectWeibos(){

        return $this->belongsToMany('App\Weibo','weibo_collects','collector_id','weibo_id')->withTimestamps();
    }

    public function followers(){
        return $this->belongsToMany($this,'user_follows','coach_id','follower_id')->withTimestamps();
    }


    public function followed(){
        return $this->belongsToMany($this,'user_follows','follower_id','coach_id')->withTimestamps();
    }


    public function followedWeibos(){
        return $this->hasManyThrough('App\Weibo','App\UserFollow','follower_id','author_id','');
    }

    public function published(){
        return $this->hasMany('App\Weibo','author_id');
    }

}
