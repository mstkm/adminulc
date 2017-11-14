<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periodes';
    protected $primaryKey = 'id';
    protected $fillable = ['year', 'quarter','status']; 

}
