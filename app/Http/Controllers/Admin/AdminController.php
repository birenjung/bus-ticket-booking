<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buses;
use App\Models\Routes;
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
}
