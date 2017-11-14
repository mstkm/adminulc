<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'name', 'username','email', 'password','admin','status','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function nota()
    {
        return $this->hasMany('App\Nota');
    }
    public function report()
    {
        return $this->hasMany('App\Report');
    }
    public function level()
    {
        return $this->hasMany('App\Level');
    } 
    public function schedule()
    {
        return $this->belongsToMany('App\Schedule');
    }
    public function userschedule()
    {
        return $this->belongsTo('App\UserSchedule');
    }
    public function attendance()
    {
        return $this->hasMany('App\Attendance','user_id','id');
    }
     
}
