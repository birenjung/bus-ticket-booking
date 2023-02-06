@extends('layouts.admin_main')
@section('component')
@section('title', 'Tickets')
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Phone Number</th>
                                    <th>Bus Name</th>                                    
                                    <th>Route</th>
                                    <th>Total</th>
                                    <th>Booked Seats</th>
                                    <th>For Date</th>
                                    <th>Boarding place</th>
                                    <th>Date</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->fullname }}</td>                                        
                                        <td>{{ $ticket->phone_number }}</td>
                                        <td>{{ $ticket->bus_name }}</td>
                                        <td>{{ $ticket->route_name }}</td>
                                        <td>{{ $ticket->total }}</td>
                                        <td>{{ $ticket['booked_seats']}}</td>
                                        <td>{{ $ticket['for_date']}} </td>
                                        <td>{{$ticket->boarding_place}}</td>
                                        <td>{{ $ticket->date }}</td>  
                                        <td>{{$ticket->payment_method}}</td>                      
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
