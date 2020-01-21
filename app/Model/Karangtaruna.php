<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Karangtaruna extends Model
{
    protected $table = 'karangtaruna';
    protected $fillable = [
        'karang_taruna',
    ];

    public function detail_karangs()
    {
        return $this->hasMany('App\Model\Detailkarang');
    }
}
