<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelSchedule extends Model
{
    protected $table = 'level_schedules';
    protected $primaryKey = 'id';
    protected $fillable = ['level_id','schedule_id']; 

    public function level()
    {
        return $this->belongsTo('App\Level','schedule_id','id');
    }    


       public function schedule()
    {
        return $this->belongsTo('App\Schedule','schedule_id','id');
    }    

    
}
