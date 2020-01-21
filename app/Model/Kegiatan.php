<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $fillable = [
        'nama_kegiatan', 
        'deskripsi', 
        'tempat',
        'waktu',
        'keterangan_tambahan',
    ];
}
