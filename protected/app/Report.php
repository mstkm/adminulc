<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id';
    protected $fillable = ['advice','grade','question_value','user_id','nota_id','periode_id','question_id']; 

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function nota()
    {
        return $this->belongsTo('App\Nota');
    }
    public function periode()
    {
        return $this->belongsTo('App\Periode');
    } 
    public function question()
    {
        return $this->belongsTo('App\Question');
    } 
}
