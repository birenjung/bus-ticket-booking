@extends('layouts.admin_main')
@section('component')
@section('title', 'Datetime')
@section('head')

@endsection

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Your Date Limit Here</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">From</label>
                    <input type="date" class="form-control" name="from" placeholder="from which date">
                    @error('from')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="exampleInputEmail1">To</label>
                    <input type="date" class="form-control" name="to" placeholder="upto which date">
                    @error('to')
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


<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Your Time Table Here</h3>        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">From</label>
                    <input type="date" class="form-control" name="from" placeholder="from which date">
                    @error('from')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="exampleInputEmail1">To</label>
                    <input type="date" class="form-control" name="to" placeholder="upto which date">
                    @error('to')
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

@section('scripts')


@endsection


@endsection
