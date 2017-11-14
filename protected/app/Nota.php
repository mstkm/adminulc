<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';
    protected $primaryKey = 'id';
    protected $fillable = ['bayar', 'asal','user_id','course_status','book_status','service_id','schedule_id', 'level_id','cust_id','periode_id','harga','reference']; 
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function level()
    {
        return $this->belongsTo('App\Level');
    } 
    public function attendance()
    {
        return $this->hasMany('App\Attendance','nota_id','id');
    } 
}
