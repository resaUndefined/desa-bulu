<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Batasdesa extends Model
{
    protected $table = 'batasdesa';
    protected $fillable = [
        'mata_angin', 
        'nama_batas',
    ];
}
