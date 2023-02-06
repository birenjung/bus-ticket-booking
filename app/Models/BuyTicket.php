<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyTicket extends Model
{
    use HasFactory;

    function user()
    {
        return $this->hasOne(User::class);
    }

    function buses()
    {
        return $this->hasOne(Buses::class);
    }

    function bookings()
    {
        return $this->hasOne(Booking::class);
    }
}
