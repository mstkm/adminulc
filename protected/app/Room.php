<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
   	protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'capacity'];    

    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    } 
}