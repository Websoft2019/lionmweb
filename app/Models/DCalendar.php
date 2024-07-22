<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCalendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_title',
        'event_location',
        'event_month',
    ];
}
