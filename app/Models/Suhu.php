<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suhu extends Model
{
    protected $table = 'suhu';
    //
    protected $fillable = [
        'no', 'ldr', 'tanggal', 'waktu',
    ];

    public $timestamps = false;
}
