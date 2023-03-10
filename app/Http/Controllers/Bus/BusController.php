<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\Controller;
use App\Models\Buses;
use Illuminate\Http\Request;
use App\Models\Routes;
use App\Models\Seats;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $bus = Buses::find($id);
        if ($bus->status == 'Active') {
            $bus->status = "Inactive";
            $bus->update();
        } else {
            $bus->status = 'Active';
            $bus->update();
        }
        toastr()->success('Bus status changed');
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'bus_name' => 'required',
            'bus_type' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'price' => 'required',
            'route' => 'required',
            'departure' => 'required',
        ]);

        $bus = new Buses();
        $bus->bus_name = $request->bus_name;
        $bus->bus_type = $request->bus_type;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move('images/buses/', $filename);
            $bus->image = 'images/buses/' . $filename;
        }

        if ($request->isWifi == 'on') {
            $bus->isWifi = 1;
        }
        if ($request->isACfan == 'on') {
            $bus->isACfan = 1;
        }
        if ($request->isMusic == 'on') {
            $bus->isMusic = 1;
        }
        if ($request->isComfortSeat == 'on') {
            $bus->isComfortSeat = 1;
        }
        if ($request->isFirstAid == 'on') {
            $bus->isFirstAid = 1;
        }
        if ($request->isWater == 'on') {
            $bus->isWater = 1;
        }
        if ($request->isCharger == 'on') {
            $bus->isCharger = 1;
        }
        if ($request->isTV == 'on') {
            $bus->isTV = 1;
        }
        $bus->price = $request->price;
        $bus->route_id = $request->route;
        $bus->departure = $request->departure;
        $bus->save();
        // // when a bus is stored, empty seats are also created.
        // $seat = new Seats();
        // $seat->isA1 = 0;
        // $seat->isA2 = 0;
        // $seat->isA3 = 0;
        // $seat->isA4 = 0;
        // $seat->isA5 = 0;
        // $seat->isB1 = 0;
        // $seat->isB2 = 0;
        // $seat->isB3 = 0;
        // $seat->isB4 = 0;
        // $seat->isB5 = 0;
        // $seat->bus_id = $bus->id;
        // $seat->user_id = auth()->user()->id;
        // $seat->save();
        toastr()->success('Bus added');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Buses::find($id);
        $routes = Routes::orderBy('created_at', 'DESC')->get();
        return view('admin.buses.edit', compact('bus', 'routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_name' => 'required',
            'bus_type' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'departure' => 'required',
        ]);

        $updateBus = Buses::find($id);
        $updateBus->bus_name = $request->bus_name;
        $updateBus->bus_type = $request->bus_type;

        if ($request->hasFile('image')) {
            $currentImage = $updateBus->image;
            unlink($currentImage);

            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move('images/buses/', $filename);
            $updateBus->image = 'images/buses/' . $filename;
        }
        $updateBus->route_id = $request->route;
        $updateBus->price = $request->price;
        $updateBus->departure = $request->departure;
        $updateBus->update();
        toastr()->success('Bus updated');
        return redirect('admin/buses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus = Buses::find($id);
        $bus->delete();
        toastr()->success('Bus deleted');
        return back();
    }
}
