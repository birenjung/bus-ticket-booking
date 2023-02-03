@extends('layouts.admin_main')
@section('component')
@section('title', 'Routes')
@section('head')

@endsection

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Your Route Here</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('store.route') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Route</label>
                    <input type="text" class="form-control" name="route_name" placeholder="E.g. Itahrai to Kathmandu">
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


<section class="content">
  <div class="container">
      <div class="row">
          <div class="col-12 p-0">              
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Your Routes</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Status</th>                                                                    
                              </tr>
                          </thead>
                          <tbody>
                              
                              @foreach($routes as $route)
                              <tr>
                                  <td>{{$route->route_name}}</td>
                                  @if($route->status == 'Active')
                                    <td><h5><Span class="badge bg-success">{{$route->status}}</Span></h5></td>
                                    @else
                                    <td><h5><Span class="badge bg-danger">{{$route->status}}</Span></h5></td>
                                    @endif                                                     
                                  <td><a href="/admin/edit-route/{{$route->id}}" class="btn-sm btn-primary">Edit</a><a class="btn-sm btn-danger ml-2" href="/admin/delete-route/{{$route->id}}">Delete</a> @if($route->status == 'Active')<a href="/admin/change-route-status/{{$route->id}}" class="btn-sm btn-danger ml-2">Change Status</a> @else <a href="/admin/change-route-status/{{$route->id}}" class="btn-sm btn-success ml-2">Change Status</a> @endif</td>
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
