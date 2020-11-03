<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Out extends Model
{
    protected $table = 'out';
    //
    protected $fillable = [
        'no', 'tanggal', 'waktu',
    ];

    public $timestamps = false;
}
