@extends('layouts.dashboard')

@section('title')
    Profile
@endsection

@section('content')
    <div class="profile-details">
        <ul>
            <li>
                <p> <strong>Fullname:</strong> {{auth()->user()->name}}</p>
            </li>
            <li>
                <p> <strong>Email Address:</strong> {{auth()->user()->email}}</p>
            </li>
            <li>
                <p> <strong>Phone Number:</strong> {{auth()->user()->phone_number}}</p>
            </li>
        </ul>
    </div>

    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{auth()->user()->name}}">
            Edit Profile
        </button>

        <!-- Modal -->
        <div class="modal fade" id="{{auth()->user()->name}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit your profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/user/update-profile/{{auth()->user()->id}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="fullname" value="{{auth()->user()->name}}">                                
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="email" value="{{auth()->user()->email}}">                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number" value="{{auth()->user()->phone_number}}">                                
                            </div>           
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changepwd">
            Change Password
        </button>

        <!-- Modal -->
        <div class="modal fade" id="changepwd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change your password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/user/change-password/{{auth()->user()->id}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Old Password</label>
                                <input type="password" class="form-control" name="oldpassword" value="">                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="password" value="">                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" value="">                                
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="email" value="{{auth()->user()->email}}">                                
                            </div>                                 
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>        
    </div>
@endsection
