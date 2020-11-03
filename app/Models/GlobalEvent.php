<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalEvent extends Model
{
    protected $table = 'event';

    protected $fillable = [
        'code', 'hasread', 'created_at', 'updated_at',
    ];

}
