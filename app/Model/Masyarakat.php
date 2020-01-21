<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakat';
    protected $fillable = [
        'klasifikasi_umur', 
        'laki', 
        'perempuan',
    ];
}
