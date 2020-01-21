<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $table = 'rt';
    protected $fillable = [
        'nama_rt', 
        'ketua_rt', 
        'jml_kk',
    ];
}
