@extends('layouts.admin_main')
@section('component')
@section('title','Dashboard')

<?Php
use App\Models\User;
use App\Models\Buses;
use App\Models\Routes;
use App\Models\Bookings;
$user_count = User::where('isRole','user')->get()->count();
$bus_count = Buses::where('status', 'Active')->get()->count();
$route_count = Routes::where('status', 'Active')->get()->count();
$date = date(today()->format('Y-m-d'));
$last_three_days_date = date( "Y-m-d",strtotime("-3 day"));
$latest_user_count = User::where('created_at','>=',$last_three_days_date)->where('isRole','user')->get()->count();
$booking = Bookings::where('payment_status', 'Paid')->get();
$revenue = 0;
foreach($booking as $item)
{
    $revenue = $revenue + $item->total_price;
}

?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">            
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Active Buses</span>
                        <span class="info-box-number">{{$bus_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Active Routes</span>
                        <span class="info-box-number">
                            {{$route_count}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Revenue</span>
                        <span class="info-box-number">{{$revenue}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">New Members</span>
                        <span class="info-box-number">{{$latest_user_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        
                    
        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection