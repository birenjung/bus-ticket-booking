<?php

namespace App\Http\Controllers\BuyTicket;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BuyTicket;
use App\Models\Seats;
use Illuminate\Http\Request;

class BuyTicketController extends Controller
{
    function store(Request $request)
    {
        // $request->validate([           
        //     'date' => 'required',
        // ]);

        $buy = new BuyTicket();
        $buy->user_id = auth()->user()->id; 
        $buy->bus_id = $request->bus_id;      
        $buy->date = $request->date;
        $buy->save();

        $seat = Seats::where('bus_id', $request->bus_id)->where('date', $request->date)->first();
        if ($request->isA1 == 'on') {
            $seat->isA1 = 1;
        }
        if ($request->isA2 == 'on') {
            $seat->isA2 = 1;
        }
        if ($request->isA3 == 'on') {
            $seat->isA3 = 1;
        }
        if ($request->isA4 == 'on') {
            $seat->isA4 = 1;
        }
        if ($request->isA5 == 'on') {
            $seat->isA5 = 1;
        }
        if ($request->isB1 == 'on') {
            $seat->isB1 = 1;
        }
        if ($request->isB2 == 'on') {
            $seat->isB2 = 1;
        }
        if ($request->isB3 == 'on') {
            $seat->isB3 = 1;
        }
        if ($request->isB4 == 'on') {
            $seat->isB4 = 1;
        }
        if ($request->isB5 == 'on') {
            $seat->isB5 = 1;
        }        
        $seat->update();

        $booking = new Booking();

        if ($request->isA1 == 'on') {
            $booking->isA1 = 1;
        }
        if ($request->isA2 == 'on') {
            $booking->isA2 = 1;
        }
        if ($request->isA3 == 'on') {
            $booking->isA3 = 1;
        }
        if ($request->isA4 == 'on') {
            $booking->isA4 = 1;
        }
        if ($request->isA5 == 'on') {
            $booking->isA5 = 1;
        }
        if ($request->isB1 == 'on') {
            $booking->isB1 = 1;
        }
        if ($request->isB2 == 'on') {
            $booking->isB2 = 1;
        }
        if ($request->isB3 == 'on') {
            $booking->isB3 = 1;
        }
        if ($request->isB4 == 'on') {
            $booking->isB4 = 1;
        }
        if ($request->isB5 == 'on') {
            $booking->isB5 = 1;
        }
        $booking->user_id = auth()->user()->id;
        $booking->bus_id = $request->bus_id;      
        $booking->date = $request->date;
        $booking->save(); 

        toastr()->success('You have successfully bought a ticket');
        return back();
    }
}
