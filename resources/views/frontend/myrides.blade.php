@extends('layouts.dashboard')

@section('title')
    Profile
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Passenger Name</th>
                <th scope="col">Bus</th>
                <th scope="col">Pick Up Point</th>
                <th scope="col">Total Fare</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sn = 1;
            @endphp
            @if (count($bookings) > 0)
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->passenger_name }}</td>
                        <td>{{$booking['bus_name']}}</td>
                        <td>{{ $booking->passenger_pickup_point }}</td>
                        <td>Rs. {{ $booking->total_price }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center text-danger">You have no any record of booking bus seats yet.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
