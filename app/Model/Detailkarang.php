<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Detailkarang extends Model
{
    protected $table = 'detailkarang';
    protected $fillable = [
        'karangtaruna_id', 
        'jabatan', 
        'pejabat',
    ];

    public function karangTaruna()
    {
        return $this->belongsTo('App\Model\Karangtaruna');
    }
}
