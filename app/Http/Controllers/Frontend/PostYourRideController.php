<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PostYourRide;
use Exception;
use Illuminate\Http\Request;

class PostYourRideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isRole == 'user')
        {
            return view('frontend.post_your_ride');
        }

        abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
           $request->validate([
                'fullname' => 'required',
                'phone_number' => 'required',
                'bus_type' => 'required',
                'leaving_from' => 'required',
                'going_destination' => 'required'
           ]);

           $postYourRide = new PostYourRide();
           $postYourRide->operator_name = $request->fullname;
           $postYourRide->phone_number = $request->phone_number;
           $postYourRide->bus_type = $request->bus_type;
           $postYourRide->leaving_from = $request->leaving_from;
           $postYourRide->going_destination = $request->going_destination;
           $postYourRide->save();

           return response([
            'msg' => 'success'
           ]);
        } catch (Exception $exception) {
            return response([
                'data' => 'error' .$exception,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = PostYourRide::find($id);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        try {
            $request->validate([
                 'fullname' => 'required',
                 'phone_number' => 'required',
                 'bus_type' => 'required',
                 'leaving_from' => 'required',
                 'going_destination' => 'required'
            ]);
 
            $postYourRide = PostYourRide::find($id);
            $postYourRide->operator_name = $request->fullname;
            $postYourRide->phone_number = $request->phone_number;
            $postYourRide->bus_type = $request->bus_type;
            $postYourRide->leaving_from = $request->leaving_from;
            $postYourRide->going_destination = $request->going_destination;
            $postYourRide->save();
 
            return back();
         } catch (Exception $exception) {
             return response([
                 'data' => 'error' .$exception,
             ]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
