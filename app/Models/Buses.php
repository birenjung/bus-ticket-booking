<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buses extends Model
{
    use HasFactory;

    function routes()
    {
        return $this->hasOne(Routes::class);
    }

    function booked_seates()
    {
        return $this->hasMany(BookedSeates::class);
    }
}
