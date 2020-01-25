<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = [
        'kategori_id', 
        'judul', 
        'isi',
        'gambar',
        'author',
        'is_slider',
    ];

    public function kat()
    {
        return $this->belongsTo('App\Model\Kategori');
    }

    public function penulis()
    {
        return $this->belongsTo('App\User');
    }
}
