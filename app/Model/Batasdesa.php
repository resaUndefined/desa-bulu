<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Batasdesa extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'batasdesa';
    protected $fillable = [
        'mata_angin', 
        'nama_batas',
    ];
}
