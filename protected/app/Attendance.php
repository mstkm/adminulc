<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $primaryKey = 'id';
    protected $fillable = ['id','kelas','nota_id','user_id','schedule_id','reference_id','status_customer','status_user','keterangan']; 

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function schedule()
    {
        return $this->belongsTo('App\Schedule');
    } 
    public function nota()
    {
        return $this->belongsTo('App\Nota','nota_id','id');
    } 
}
