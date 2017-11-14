<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomSchedule extends Model
{
    protected $table = 'room_schedules';
    protected $primaryKey = 'id';
    protected $fillable = ['room_id','schedule_id']; 
}
