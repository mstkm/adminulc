<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'username','phone','addres','email', 'birthdate','photo'];    

    public function nota()
    {
        return $this->hasMany('App\Nota');
    }
    public function report()
    {
        return $this->hasMany('App\Report');
    }
    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    } 
}
