<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    function buses()
    {
        return $this->belongsTo(Buses::class);
    }

    function users()
    {
        return $this->belongsTo(User::class);
    }
}
