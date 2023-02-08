<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buses;
use App\Models\BuyTicket;
use App\Models\Routes;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index()
    {
        if(Auth::user()->isRole == 'admin')
        {
            return view('admin.index');
        }
        abort(403);
    } 
    
    function buses()
    {
        
        $routes = Routes::orderBy('created_at','DESC')->get();
        $buses = DB::table('routes')
            ->join('buses', 'routes.id', '=', 'buses.route_id')                    
            ->get();
        return view('admin.buses.index', compact('buses', 'routes'));
    }

    function routes()    
    {
        $routes = Routes::all();
        return view('admin.routes.index', compact('routes'));
    }

    function tickets()
    {
        $bookings = Bookings::all();
        foreach($bookings as $booking)
        {
            $bus = Buses::find($booking->bus_id);
            $booking['bus_name'] = $bus->bus_name;            
        }     

       return view('admin.tickets.index', compact('bookings'));
        // return response([
        //     'data' => $bookings
        // ]);
    }

    function showBookings(Request $request)
    {
                
        $booking_info = Bookings::where('bus_id', $request->bus_name)->where('booking_date', $request->date)->get();

        return view('admin.tickets.bookings', compact('booking_info'));
    }

    function changePayStatus($id)
    {
        $booking = Bookings::find($id);
        if($booking->payment_status == 'Pending')
        {
            $booking->payment_status = 'Paid';
            $booking->update();
            return back();
        }
        else
        {
            $booking->payment_status = 'Pending';
            $booking->update();
            return back();
        }

    }
}
