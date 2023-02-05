@extends('layouts.frontend')

@section('title')
    Payment
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
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
                        <a href="#" class="btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
