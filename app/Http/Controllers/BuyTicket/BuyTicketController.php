<?php

namespace App\Http\Controllers\BuyTicket;

use App\Http\Controllers\Controller;
use App\Models\BookedSeates;
use App\Models\Booking;
use App\Models\Bookings;
use App\Models\Buses;
use App\Models\BuyTicket;
use App\Models\Seats;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BuyTicketController extends Controller
{
    function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'passenger_name' => 'required',
            'passenger_phone_number' => 'required',
            'passenger_pickup_point' => 'required',
            'payment_terms' => 'required',
        ]);

        $booking = new Bookings();
        $booking->bus_id =  $request->bus_id;
        $booking->booking_date = $request->booking_date;
        $booking->user_id = auth()->user()->id;
        $booking->passenger_name = $request->passenger_name;
        $booking->passenger_phone_number = $request->passenger_phone_number;
        $booking->passenger_pickup_point = $request->passenger_pickup_point;
        $qty = count($request->seat_number);
        $fare = Buses::find($request->bus_id);
        $booking->total_price = $qty * $fare->price;
        if($request->payment_terms == 1)
        {
            $booking->payment_terms = 'Pay after pickup';
        } 
        if($request->payment_terms == 2)
        {
            $booking->payment_terms = 'Pay before pickup';
        } 
       
        $booking->save();

          
        
        $seat_id = $request->seat_number;

        foreach($seat_id as $seats)
        {
            $booked_seats = new BookedSeates();   
            $booked_seats->seat_id = $seats;
            $booked_seats->booking_id = $booking->id;
            $booked_seats->save();   
        }

       

        toastr()->success('Booking successfull.');
        return redirect('/');
    }
   
}
