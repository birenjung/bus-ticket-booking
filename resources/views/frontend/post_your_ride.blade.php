@extends('layouts.frontend')

@section('title')
    Post your ride page
@endsection

@section('content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
            <h3 class="text-center mb-3">Post Your Ride Here</h3>
            <form style="width: 400px" method="POST" action="{{ route('store.postYourRide') }}">
              @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Operator's Fullname</label>
                  <input type="text" class="form-control" name="fullname">                  
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="phone_number">                  
                </div>
                <div class="mb-3">
                  <label for="">Select bus type</label>
                  <select class="form-select" aria-label="Default select example" name="bus_type">                    
                    <option value="1">Tourist</option>
                    <option value="2">Delux</option>
                    <option value="3">Normal</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Leaving from</label>                  
                  <input type="text" class="form-control" name="leaving_from">                            
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Going destination</label>                  
                  <input type="text" class="form-control" name="going_destination">                            
                </div>        
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        
    </div>
</div>
@endsection
