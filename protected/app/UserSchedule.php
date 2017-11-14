<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSchedule extends Model
{
	protected $table = 'user_schedules';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','schedule_id']; 
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }    


       public function schedule()
    {
        return $this->belongsTo('App\Schedule');
    }  
}
