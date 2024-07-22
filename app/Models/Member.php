<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'level'
    ];

}
