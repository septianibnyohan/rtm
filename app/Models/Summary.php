<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $table = 'summary';
    //
    protected $fillable = [
        'suhu_normal', 'suhu_tinggi', 'jumlah_masuk', 'jumlah_keluar', 'di_dalam_ruangan', 'kapasitas_ruangan'
    ];

    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
