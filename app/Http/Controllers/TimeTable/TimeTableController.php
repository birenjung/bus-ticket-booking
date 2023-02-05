<?php

namespace App\Http\Controllers\TimeTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    function tickets()
    {
        return view('admin.tickets.date_time');
    }
}
