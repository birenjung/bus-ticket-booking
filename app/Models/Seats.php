<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seats extends Model
{
    use HasFactory;
    function buses()
    {
        return $this->hasOne(Buses::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
