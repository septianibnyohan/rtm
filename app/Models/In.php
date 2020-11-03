<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class In extends Model
{
    protected $table = 'in';
    //
    protected $fillable = [
        'no', 'tanggal', 'waktu',
    ];

    public $timestamps = false;
}
