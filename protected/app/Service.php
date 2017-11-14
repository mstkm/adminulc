<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'type'];

    public function level()
    {
        return $this->hasMany('App\Level','service_id');
    }
}
