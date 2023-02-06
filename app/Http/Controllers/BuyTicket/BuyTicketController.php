<?php

namespace App\Http\Controllers\BuyTicket;

use App\Http\Controllers\Controller;
use App\Models\Booking;
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
       $valid = [$request->isA1,
                    $request->isA2,
                    $request->isA3,
                    $request->isA4,
                    $request->isA5,
                    $request->isB1,
                    $request->isB2,
                    $request->isB3,
                    $request->isB4,
                    $request->isB5,                       
    ];

    $match = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    if($valid == [...$match])
    {
        toastr()->warning('Select at least one seat.');
        return back();
    }else
    {
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
        $booking->date_of_booking = Carbon::now();
        $booking->save();



        $count = Booking::count();
        $booking = Booking::find($count);        
        $qty = [];

        if ($booking->isA1 == 1) {
            array_push($qty, 'A1');
        }
        if ($booking->isA2 == 1) {
            array_push($qty, 'A2');
        }
        if ($booking->isA3 == 1) {
            array_push($qty, 'A3');
        }
        if ($booking->isA4 == 1) {
            array_push($qty, 'A4');
        }
        if ($booking->isA5 == 1) {
            array_push($qty, 'A5');
        }
        if ($booking->isB1 == 1) {
            array_push($qty, 'B1');
        }
        if ($booking->isB2 == 1) {
            array_push($qty, 'B2');
        }
        if ($booking->isB3 == 1) {
            array_push($qty, 'B3');
        }
        if ($booking->isB4 == 1) {
            array_push($qty, 'B4');
        }
        if ($booking->isB5 == 1) {
            array_push($qty, 'B5');
        }        

        $booked_seats = implode(', ', $qty);
        $booking->booked_seats = $booked_seats;        
        $bus_fare = Buses::find($request->bus_id);
        $booking->fare = $bus_fare->price;
        $booking->qty = count($qty);
        $booking->total = $booking['fare'] * $booking['qty'];
        $booking->update();

        // toastr()->success('You have successfully bought a ticket');
       return view('frontend.payment', compact('booking'));
       //return redirect()->route('payment.info');
    }

    }

    function checkout(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'phone_number' => 'required',
            'boarding_place' => 'required',
            'payment_method' => 'required',
        ]);

        $buy_ticket = new BuyTicket();
        $buy_ticket->fullname = $request->fullname;
        $buy_ticket->phone_number = $request->phone_number;
        $buy_ticket->boarding_place = $request->boarding_place;
        $buy_ticket->payment_method = $request->payment_method;
        $buy_ticket->qty = $request->qty;
        $buy_ticket->total = $request->total;
        $buy_ticket->user_id = auth()->user()->id;
        $buy_ticket->bus_id = $request->bus_id;
        $buy_ticket->booking_id = $request->id;
        $buy_ticket->date = Carbon::now();
        $buy_ticket->save();

        toastr()->success('You have purchased a ticket.');
        return redirect('/');

        
    }

    function paymentInfo()
    {
        return view('frontend.payment');
    }
}
