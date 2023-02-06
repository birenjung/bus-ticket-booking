@extends('layouts.frontend')

@section('title')
    Payment
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body px-3">
                        <h5 class="card-title">Payment Info</h5>
                        <p class="card-text">
                            Seats Booked : @php
                                if ($booking->isA1 == 1) {
                                    echo 'A1 ';
                                }
                                if ($booking->isA2 == 1) {
                                    echo 'A2 ';
                                }
                                if ($booking->isA3 == 1) {
                                    echo 'A3 ';
                                }
                                if ($booking->isA4 == 1) {
                                    echo 'A4 ';
                                }
                                if ($booking->isA5 == 1) {
                                    echo 'A5 ';
                                }
                                
                                if ($booking->isB1 == 1) {
                                    echo 'B1 ';
                                }
                                if ($booking->isB2 == 1) {
                                    echo 'B2 ';
                                }
                                if ($booking->isB3 == 1) {
                                    echo 'B3 ';
                                }
                                if ($booking->isB4 == 1) {
                                    echo 'B4 ';
                                }
                                if ($booking->isB5 == 1) {
                                    echo 'B5 ';
                                }
                            @endphp
                        <p>No. of seats booked : {{ $booking->qty }}</p>
                        <p>Total Fare : {{ $booking->total }}</p>
                        </p>
                        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Check Out
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Fill the form.</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('checkout')}}">
                                            @csrf
                                            <div class="mb-3">
                                              <label class="form-label">Name</label>
                                              <input type="text" class="form-control" name="fullname">
                                              <input type="hidden" name="qty" value="{{$booking->qty}}">                                              
                                              <input type="hidden" name="total" value="{{$booking->total}}">                                              
                                              <input type="hidden" name="bus_id" value="{{$booking->bus_id}}">                                              
                                              <input type="hidden" name="id" value="{{$booking->id}}">                                              
                                            </div>
                                            <div class="mb-3">
                                              <label class="form-label">Phone Number</label>
                                              <input type="text" class="form-control" name="phone_number">                                              
                                            </div>
                                            <div class="mb-3">
                                              <label class="form-label">Boarding place</label>
                                              <input type="text" class="form-control" name="boarding_place">                                              
                                            </div>
                                            <div class="mb-3">
                                                <p>Payment Method</p>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="khalti" name="payment_method">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                      Khalti
                                                    </label>
                                                  </div>                                             
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="cod" name="payment_method">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                      COD
                                                    </label>
                                                  </div>                                             
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
