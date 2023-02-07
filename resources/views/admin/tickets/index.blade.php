@extends('layouts.admin_main')
@section('component')
@section('title', 'Search for Booking Details')
@section('head')

@endsection

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Your Ticket Orders</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('bookings') }}" method="get">
                            {{-- @csrf --}}
                            <div class="mb-3">
                                <label for="bus_name">Select Bus</label>
                                <select class="form-control" aria-label="Default select example" name="bus_name">
                                    @foreach ($bookings as $booking)
                                        <option value="{{ $booking->bus_id }}">{{ $booking['bus_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="bus_name">Select Date</label>
                                <select class="form-control" aria-label="Default select example" name="date">
                                    @foreach ($bookings as $booking)
                                        <option value="{{ $booking->booking_date }}">{{ $booking->booking_date }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">View booking</button>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>



@section('scripts')


@endsection


@endsection
