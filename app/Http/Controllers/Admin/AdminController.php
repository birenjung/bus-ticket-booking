<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buses;

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
        $buses = Buses::all();
        return view('admin.buses.index', compact('buses'));
    }
}
