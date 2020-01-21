<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';
    protected $fillable = [
        'nama_fasilitas',
    ];
}
