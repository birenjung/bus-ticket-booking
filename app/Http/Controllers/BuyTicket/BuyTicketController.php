<?php

namespace App\Http\Controllers\BuyTicket;

use App\Http\Controllers\Controller;
use App\Models\BuyTicket;
use Illuminate\Http\Request;

class BuyTicketController extends Controller
{
    function store(Request $request)
    {
        $request->validate([           
            'date' => 'required',
        ]);

        $buy = new BuyTicket();
        $buy->user_id = auth()->user()->id; 
        $buy->bus_id = $request->bus_id;      
        $buy->date = $request->date;
        $buy->save();

        toastr()->success('You have successfully bought a ticket');
        return back();
    }
}
