<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $tickets = BuyTicket::all();
        
       
       foreach($tickets as $ticket)
       {
            $user = User::where('id', $ticket->user_id)->first();       
            $ticket['fullname'] = $user->name;
            $ticket['phone_number'] = $user->phone_number;
            $buses = Buses::where('route_id', $ticket->bus_id)->first();   
            $ticket['bus_name'] = $buses->bus_name;
            $routes = Routes::where('id', $buses->route_id)->first();
            $ticket['route_name'] = $routes->route_name;                           
       }

       

       return view('admin.tickets.index', compact('tickets'));
        // return response([
        //     'data' => $tickets
        // ]);
    }
}
