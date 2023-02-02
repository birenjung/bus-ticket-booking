<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function home()
    {
        return view('frontend.index');
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
