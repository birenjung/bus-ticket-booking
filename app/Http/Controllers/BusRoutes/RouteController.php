<?php

namespace App\Http\Controllers\BusRoutes;

use App\Http\Controllers\Controller;
use App\Models\Routes;
use Illuminate\Http\Request;


class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $route = Routes::find($id);
        if($route->status == 'Active')
        {
            $route->status = 'Inactive';
            $route->update();
        }
        else
        {
            $route->status = 'Active';
            $route->update();
        }

        toastr()->success('Route status changed');
        return back();
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
        //$this->authorize('isAdmin', Routes::class);
        $request->validate([
            'route_name' => 'required'
        ]);

        $route = new Routes();
        $route->route_name = $request->route_name;
        $route->save();

        toastr()->success('Route Added');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $route = Routes::find($id);
        return view('admin.routes.edit', compact('route'));
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
            'route_name' => 'required' 
        ]);

        $route = Routes::find($id);
        $route->route_name = $request->route_name;
        $route->update();

        toastr()->success('Route updated.');
        return redirect('admin/routes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = Routes::find($id);
        $route->delete();

        toastr()->success('Route deleted.');
        return back();
    }
}
