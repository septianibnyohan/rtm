<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalEvent extends Model
{
    protected $table = 'cal_events';
    //
    protected $fillable = [
        'title', 'start_event', 'end_event', 'description', 'classname', 'color', 'text_color', 'event_type'
    ];
}
