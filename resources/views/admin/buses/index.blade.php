@extends('layouts.admin_main')
@section('component')
@section('title', 'Buses')
@section('head')

@endsection

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Your Bus Here</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('store.buses') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Bus name</label>
                    <input type="text" class="form-control" name="bus_name" placeholder="Enter bus name">
                    @error('bus_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bus type</label>
                    <input type="text" class="form-control" name="bus_type" placeholder="Enter bus type">
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
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Route</label>
                    <select class="form-select" aria-label="Default select example" name="route">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    @error('route')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group bus-feature-list">
                    <div class="form-check bus-feature-list-items">
                        <input class="form-check-input" type="checkbox" value="on" name="isWifi"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Wifi
                        </label>
                    </div>
                    <div class="form-check bus-feature-list-items">
                        <input class="form-check-input" type="checkbox" value="on" name="isACfan"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            A/C and Fan
                        </label>
                    </div>
                    <div class="form-check bus-feature-list-items">
                        <input class="form-check-input" type="checkbox" value="on" name="isMusic"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Music
                        </label>
                    </div>
                    <div class="form-check bus-feature-list-items">
                        <input class="form-check-input" type="checkbox" value="on" name="isComfortSeat"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Comfortable Seats
                        </label>
                    </div>
                    <div class="form-check bus-feature-list-items">
                        <input class="form-check-input" type="checkbox" value="on" name="isFirstAid"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            First Aid Kits
                        </label>
                    </div>
                    <div class="form-check bus-feature-list-items">
                        <input class="form-check-input" type="checkbox" value="on" name="isWater"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Mineral Water
                        </label>
                    </div>
                    <div class="form-check bus-feature-list-items">
                        <input class="form-check-input" type="checkbox" value="on" name="isCharger"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Mobile Charger
                        </label>
                    </div>
                    <div class="form-check bus-feature-list-items">
                        <input class="form-check-input" type="checkbox" value="on" name="isTV"
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            TV
                        </label>
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
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Bus Type</th>
                                    <th width="20%">Images</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($buses as $bus)
                                    <tr>
                                        <td>{{ $bus->bus_name }}</td>
                                        @if ($bus->status == 'Active')
                                            <td>
                                                <h5><Span class="badge bg-success">{{ $bus->status }}</Span></h5>
                                            </td>
                                        @else
                                            <td>
                                                <h5><Span class="badge bg-danger">{{ $bus->status }}</Span></h5>
                                            </td>
                                        @endif
                                        <td>{{ $bus->bus_type }}</td>
                                        <td><img src="{{ url($bus->image) }}" alt="{{ $bus->bus_name }}"
                                                width="50%"></td>
                                        <td><a href="/admin/edit-bus/{{ $bus->id }}"
                                                class="btn-sm btn-primary">Edit</a><a class="btn-sm btn-danger ml-2"
                                                href="/admin/delete-bus/{{ $bus->id }}">Delete</a>
                                            @if ($bus->status == 'Active')
                                                <a href="/admin/change-ad-status/{{ $bus->id }}"
                                                    class="btn-sm btn-danger ml-2">Change Status</a>
                                            @else
                                                <a href="/admin/change-ad-status/{{ $bus->id }}"
                                                    class="btn-sm btn-success ml-2">Change Status</a>
                                            @endif
                                        </td>
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
