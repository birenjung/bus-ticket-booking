<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BookedSeates;
use App\Models\Bookings;
use Illuminate\Http\Request;
use App\Models\Buses;
use App\Models\Routes;
use App\Models\Seats;
use App\Models\User;
use Flasher\Prime\Response\ResponseManager;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FrontendController extends Controller
{
    function home()
    {

        $buses = Buses::where('status', 'Active')->get();
        foreach ($buses as $bus) {
            $route = Routes::where('id', $bus->route_id)->first();
            $bus['route'] = $route->route_name;
            $seats = Seats::where('bus_id', $bus->id)->first();
            $bus['seats'] = $seats;
        } 
        return view('frontend.index', compact('buses'));
    }

    function manageMyAccount()
    {
        if (auth()->user()) {
            return view('frontend.userprofile');
        }
        abort(403);
    }

    function myrides()
    {
        if (auth()->user()->isRole == 'user') {
            return view('frontend.myrides');
        }

        abort(403);
    }

    function search(Request $request)
    {
        $request->validate([
            'search_bus' => 'required',
            'date' => 'required',
        ]);

        $query = $request->search_bus;
        $date = $request->date;
        $buses = DB::table('routes')
            ->join('buses', 'routes.id', '=', 'buses.route_id')
            ->where('route_name', 'like', "%$query%")
            ->get();        
            
        return view('frontend.search_results', compact('buses', 'query', 'date'));
    }

    function selectSeat($id, $date)
    {
        if (!auth()->user()) {
            toastr()->warning('Please register and login to proceed.');
            return back();
        } else {
            
            $bus = Buses::find($id);

            $seates = Seats::where('bus_id',$id)->get();
            
            $bookings = Bookings::where('bus_id',$id)->where('booking_date',$date)->get();

            foreach($bookings as $book)
            {
                $booked_seat = BookedSeates::where('booking_id',$book->id)->get();
                $book['booked_seats'] = $booked_seat;

                foreach($seates as $seat)
                {
                    foreach($booked_seat as $books)
                    {
                        if($books->seat_id == $seat->id)
                        {
                            $seat['booked_status'] = True;
                            break;
                        }
                    }
                }
            }

            $bus['seates'] = $seates;
            $bus['bookings'] = $bookings;

            $booking_date = $date;

            return view('frontend.selectseats', compact('bus','booking_date'));
        }
    }
}
