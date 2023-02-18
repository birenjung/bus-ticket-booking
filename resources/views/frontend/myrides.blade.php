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
                <th scope="col">Action</th>

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
                        <td>{{ $booking['bus_name'] }}</td>
                        <td>{{ $booking->passenger_pickup_point }}</td>
                        <td>Rs. {{ $booking->total_price }}</td>
                        <td><a href="/download-ticket" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-{{ $booking->id }}">Download Ticket</a></td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal-{{ $booking->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Download Your Ticket Here</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body container-fluid border p-3" id="ticket">
                                    <div class="passenger-details row">
                                        <div class="passenger-name col-lg-6">
                                            <label for=""><strong>Passenger Name</strong></label>
                                            <h6>{{ $booking->passenger_name }}</h6>
                                        </div>
                                        <div class="pickup-place col-lg-6">
                                            <label for=""><strong>Pickup Point</strong></label>

                                            <h6>{{ $booking->passenger_pickup_point }}</h6>
                                        </div>
                                    </div>
                                    <div class="trip-details row">
                                        <div class="bus-details col-lg-6">
                                            <label for=""><strong>Bus Name</strong></label>
                                            <h6>{{ $booking['bus_name'] }}</h6>
                                        </div>
                                        <div class="trip-route col-lg-6">
                                            <label for=""><strong>Travel Route</strong></label>
                                            <h6>{{ $booking['route'] }}</h6>
                                        </div>
                                    </div>
                                    <div class="trip-details row">
                                        <div class="bus-details col-lg-6">
                                            <label for=""><strong>Ticket No.</strong></label>
                                            <h6>#{{ $booking->id }}</h6>
                                        </div>
                                        <div class="trip-route col-lg-6">
                                            <label for=""><strong>Price</strong></label>
                                            <h6>{{ $booking->total_price }}</h6>
                                        </div>
                                    </div>
                                    <div class="trip-details row">
                                        <div class="bus-details col-lg-6">
                                            <label for=""><strong>No. of Booked Seat</strong></label>
                                            <h6>#{{ $booking->no_of_seats_booked }}</h6>
                                        </div>
                                        <div class="trip-route col-lg-6">
                                            <label for=""><strong>Seat Numbers</strong></label>
                                            <h6>
                                                @foreach ($booking->booked_seat as $seats)
                                                    {{ $seats->seat_name }}
                                                @endforeach
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" id="pdf" class="btn btn-primary">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center text-danger">You have no any record of booking bus seats yet.</td>
                </tr>
            @endif
        </tbody>
    </table>



    <script>
        const button = document.getElementById('pdf');

        function generatePDF() {
            // Choose the element that your content will be rendered to.
            const element = document.getElementById('ticket');
            // Choose the element and save the PDF for your user.
            html2pdf().from(element).save();
        }

        button.addEventListener('click', generatePDF);
    </script>
@endsection
