<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $primaryKey = 'id';
    protected $fillable = ['name','day', 'date','start','end', 'capacity','durasi']; 

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    public function nota()
    {
        return $this->hasMany('App\Nota');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function attendance()
    {
        return $this->hasMany('App\Attendance');
    }    
    public function level()
    {
        return $this->belongsToMany('App\Level');
    }
    public function room()
    {
        return $this->belongsTo('App\Room');
    }
    public function levelSchedule()
    {
        return $this->hasMany('App\levelSchedule');
    } 
    public function userschedule()
    {
        return $this->belongsTo('App\UserSchedule');
    } 
     
}
