<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    protected $fillable = [
        'name',
        'value',
        'latitude',
        'longitude',
        'user_id'
    ];
}
