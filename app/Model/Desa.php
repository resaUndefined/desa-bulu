<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';
    protected $fillable = [
        'desa', 
        'kepala_dukuh', 
        'ketua_rw', 
        'ketua_pkk',
    ];
}
