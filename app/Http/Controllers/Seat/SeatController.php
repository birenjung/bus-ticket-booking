<?php

namespace App\Http\Controllers\Seat;

use App\Http\Controllers\Controller;
use App\Models\Seats;
use Illuminate\Http\Request;
use App\Models\Buses;
use Carbon\Carbon;

class SeatController extends Controller
{
    function store(Request $request, $bus_id)
    {
        $request->validate([
            'seat_number' => 'required',
        ]);
        
        $seat = new Seats();
        $bus = Buses::find($bus_id);
        $seat->bus_id = $bus->id;
        $seat->seat_number = $request->seat_number;
        //$seat->date = Carbon::now()->format('Y-m-d');
        if($request->is_booked == 'on')
        {
            $seat->is_booked = 1;
        }
        $seat->save();

        toastr()->success('A seat is added.');
        return back();
    }

    function create($bus_id)
    {
        $bus = Buses::find($bus_id);
        $seats = Seats::where('bus_id', $bus->id)->get();
        return view('admin.buses.addseat', compact('seats', 'bus'));
    }
}
