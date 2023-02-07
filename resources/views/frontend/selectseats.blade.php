@extends('layouts.frontend')

@section('title')
    Select Seat
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('ticket.buy') }}" method="post">
                    @csrf
                    <div class="label">
                        <h4 for="">Select Seat To Book</h4>
                    </div>
                    <div class="d-flex justify-content-evenly flex-wrap">
                        <?php
                        $seats = $bus->seates;
                        ?>

                        @foreach ($seats as $seat)
                            <div class="mb-3" style="width:20%;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $seat->id }}"
                                        name="seat_number[]" id="flexCheckDefault"
                                        @if ($seat->booked_status == true) checked disabled readonly @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $seat->seat_number }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Passenger Name</label>
                        <input type="text" class="form-control" name="passenger_name">
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Passenger Phone Number</label>
                        <input type="number" class="form-control" name="passenger_phone_number">
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Passenger Pickup Point</label>
                        <input type="text" class="form-control" name="passenger_pickup_point">
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <label for="">Payment terms</label>
                        <select name="payment_terms" id="" class="form-control">
                            <option value="1">Pay after pickup</option>
                            <option value="2">Pay before pickup</option>
                        </select>
                    </div>

                    <input type="hidden" value="{{$bus->id}}" name="bus_id" hidden readonly>

                    <input type="hidden" value="{{$booking_date}}" name="booking_date" hidden readonly>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
