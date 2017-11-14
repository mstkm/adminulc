<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionReport extends Model
{
    protected $table = 'question_reports';
    protected $primaryKey = 'id';
    protected $fillable = ['question_id', 'report_id','question_value'];    

    public function question()
    {
        return $this->belongsTo('App\Question');
    } 
    public function report()
    {
        return $this->belongsTo('App\Report');
    }
}
