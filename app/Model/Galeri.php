<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $fillable = [
        'gambar', 
        'caption',
    ];
}
