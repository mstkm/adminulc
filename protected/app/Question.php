<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   	protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $fillable = ['question', 'service_type','question_for'];    

    public function report()
    {
        return $this->hasMany('App\Report');
    } 
}
