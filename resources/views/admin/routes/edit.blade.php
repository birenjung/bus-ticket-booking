@extends('layouts.admin_main')
@section('component')
@section('title', 'Edit Route')
@section('head')

@endsection

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Your Route Here</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="/admin/update-route/{{$route->id}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Route</label>
                    <input type="text" class="form-control" name="route_name" value="{{$route->route_name}}">
                    @error('route_name')
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
