<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buses;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    function home()
    {
        $buses = DB::table('routes')
            ->join('buses', 'routes.id', '=', 'buses.route_id')            
            ->get();     
        return view('frontend.index', compact('buses'));
    }  
    
    function manageMyAccount()
    {
        if(auth()->user()->isRole == 'user')
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
}
