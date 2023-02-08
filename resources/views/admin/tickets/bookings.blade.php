@extends('layouts.admin_main')
@section('component')
@section('title', 'Booking Details')
@section('head')

@endsection
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bookings</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Ps Name</th>
                                    <th>Phone</th>
                                    <th>Pick up point</th>
                                    <th>Payment terms</th>
                                    <th>Payment Status</th>
                                    <th>Total price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                            if(isset($booking_info))
                            {
                                foreach($booking_info as $b_info)
                                {
                                    ?><tr>
                                <td>{{$b_info->passenger_name}}</td>
                                <td>{{$b_info->passenger_phone_number}}</td>
                                <td>{{$b_info->passenger_pickup_point}}</td>
                                <td>{{$b_info->payment_terms}}</td>
                                
                                    @if ($b_info->payment_status == 'Paid')
                                            <td>
                                                <h5><Span class="badge bg-success">{{ $b_info->payment_status }}</Span></h5>
                                            </td>
                                        @else
                                            <td>
                                                <h5><Span class="badge bg-danger">{{ $b_info->payment_status }}</Span></h5>
                                            </td>
                                        @endif                              
                               
                                <td> Rs. {{$b_info->total_price}}</td>
                                <td>
                                @if ($b_info->payment_status == 'Active')
                                    <a href="/admin/change-pay-status/{{ $b_info->id }}"
                                        class="btn-sm btn-danger ml-2">Change Payment Status</a>
                                @else
                                    <a href="/admin/change-pay-status/{{ $b_info->id }}"
                                        class="btn-sm btn-success ml-2">Change Payment Status</a>
                                @endif
                                                                        
                            </td>
                            </tr><?php
                                }                        
                            }                       

                           ?>

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
