<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        foreach($buses as $bus)
        {
            $route = Routes::where('id', $bus->route_id)->first();
            $bus['route'] = $route->route_name;
            $seats = Seats::where('bus_id', $bus->id)->first();
            $bus['seats'] = $seats;           
                
        }
        // $buses = DB::table('routes')
        //     ->join('buses', 'routes.id', '=', 'buses.route_id')            
        //     ->where('buses.status', 'Active')
        //     ->get();
        // return response([
        //     'msg' => $buses,
        // ]) ;   
       return view('frontend.index', compact('buses'));
    }  
    
    function manageMyAccount()
    {    
        if(auth()->user())
        {
            return view('frontend.userprofile');  
        }
        abort(403);
            
    }
    
    function myrides()
    {
        if(auth()->user()->isRole == 'user')
        {
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
            ->where('routes.status', 'Active')     
            ->where('route_name', 'like', "%$query%")            
            ->get();            
        return view('frontend.search_results', compact('buses', 'query', 'date'));
            
    }

    function selectSeat($id, $date)    
    {
        if(!auth()->user())
        {
            toastr()->warning('Please register and login to proceed.');
            return back();
        }
        else
        {
            $bus = Buses::find($id);
            $checkseats = Seats::where('bus_id', $bus->id)->where('date', $date)->first();
            if(!$checkseats)
            {
                $seat = new Seats();
                $seat->isA1 = 0;
                $seat->isA2 = 0;
                $seat->isA3 = 0;
                $seat->isA4 = 0;
                $seat->isA5 = 0;
                $seat->isB1 = 0;
                $seat->isB2 = 0;
                $seat->isB3 = 0;
                $seat->isB4 = 0;
                $seat->isB5 = 0;
                $seat->bus_id = $bus->id;
                $seat->user_id = auth()->user()->id;
                $seat->date = $date;
                $seat->save(); 
                
                $checkseats = Seats::find($seat->id);               
            }
           
            return view('frontend.selectseats', compact('checkseats'));
        }             
    }   
}
