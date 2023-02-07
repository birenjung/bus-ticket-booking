@extends('layouts.admin_main')
@section('component')
@section('title', 'Add Seat')
@section('head')

@endsection

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Seat Here</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="/admin/add-seat/{{$bus->id}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Seat Number</label>
                    <input type="text" class="form-control" name="seat_number" placeholder="E.g A1">
                    <input type="hidden" name="bus_id" value="{{$bus->id}}">
                    @error('seat_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror                    
                </div>               
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Your Buses</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Seat Number</th>
                                    <th>Status</th>                                    
                                </tr>
                            </thead>
                            <tbody>

                               
                                @foreach ($seats as $seat)
                                <tr>
                                    <td>{{ $seat->seat_number }}</td>
                                    @if ($seat->is_booked == 0)
                                        <td>
                                            Available
                                        </td>
                                    @else
                                        <td>
                                            Booked
                                        </td>
                                    @endif                                        
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
