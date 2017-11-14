<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['judul','slug_judul', 'isi','gambar','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
