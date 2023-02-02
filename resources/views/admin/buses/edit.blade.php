@extends('layouts.admin_main')
@section('component')
@section('title', 'Edit Buses')
@section('head')

@endsection

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Your Bus Here</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="/admin/update-bus/{{ $bus->id }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Bus name</label>
                    <input type="text" class="form-control" name="bus_name" value="{{ $bus->bus_name }}">
                    @error('bus_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bus type</label>
                    <input type="text" class="form-control" name="bus_type" value="{{ $bus->bus_type }}">
                    @error('bus_type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Bus image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>                   
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
