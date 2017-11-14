<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	protected $table = 'levels';
    protected $primaryKey = 'id';
    protected $fillable = ['name','harga_daftar','harga_ubaya','harga_umum','minimal_customer','service_id'];    

    public function service()
    {
        return $this->belongsTo('App\Service');
    }    

    public function nota()
    {
        return $this->hasMany('App\Nota');
    }
    
    public function levelSchedule()
    {
        return $this->belongsTo('App\levelSchedule','level_id','id');
    } 
    
    public function schedule()
    {
        return $this->belongsToMany('App\Schedule');
    }
}
