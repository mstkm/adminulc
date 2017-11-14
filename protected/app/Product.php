<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','slug_nama', 'keterangan','gambar','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
