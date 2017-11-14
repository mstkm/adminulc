<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSchedule extends Model
{
    protected $table = 'customer_schedules';
    protected $primaryKey = 'id';
    protected $fillable = ['cust_id','schedule_id']; 
    
    public function user()
    {
        return $this->belongsTo('App\Customer');
    }    


       public function schedule()
    {
        return $this->belongsTo('App\Schedule');
    } 
}
