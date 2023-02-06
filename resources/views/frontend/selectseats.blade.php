@extends('layouts.frontend')

@section('title')
    Select Seat
@endsection
@section('content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <form action="{{ route('store.buy') }}" method="post">
            @csrf
            {{-- <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="fullname" value="{{auth()->user()->name}}">                                                        
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="number" class="form-control" name="phone_number" value="{{auth()->user()->phone_number}}">                                                        
            </div>                                              --}}
            <div class="mb-3">
                <label class="form-label">Ticket for Date <span class="text-danger">{{$checkseats->date}}</span></label>
                <input type="hidden" class="form-control" name="date" value="{{$checkseats->date}}">
            </div>
            <div class="mb-3">
                <input type="hidden" class="form-control" name="bus_id"
                    value="{{ $checkseats->bus_id }}">
            </div>
           
            <div class="d-flex justify-content-evenly flex-wrap">
                <div class="mb-3" style="width:20%;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" 
                            value="on" name="isA1" id="flexCheckDefault" @if(old('isA1', $checkseats->isA1 )) checked disabled readonly @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            A1
                        </label>
                    </div>
                </div>
                <div class="mb-3" style="width:20%;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                        value="on" name="isA2" id="flexCheckDefault" @if(old('isA1', $checkseats->isA2 )) checked disabled readonly @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            A2
                        </label>
                    </div>
                </div>
                <div class="mb-3" style="width:20%;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                        value="on" name="isA3" id="flexCheckDefault" @if(old('isA1', $checkseats->isA3 )) checked disabled readonly @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            A3
                        </label>
                    </div>
                </div>
                <div class="mb-3" style="width:20%;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                        value="on" name="isA4" id="flexCheckDefault" @if(old('isA1', $checkseats->isA4 )) checked disabled readonly @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            A4
                        </label>
                    </div>
                </div>
                <div class="mb-3" style="width:20%;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                        value="on" name="isA5" id="flexCheckDefault" @if(old('isA1', $checkseats->isA5 )) checked disabled readonly @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            A5
                        </label>
                    </div>
                </div>
                <div class="mb-3" style="width:20%;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                        value="on" name="isB1" id="flexCheckDefault" @if(old('isA1', $checkseats->isB1 )) checked disabled readonly @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            B1
                        </label>
                    </div>
                </div>
                <div class="mb-3" style="width:20%;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                        value="on" name="isB2" id="flexCheckDefault" @if(old('isA1', $checkseats->isB2 )) checked disabled readonly @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            B2
                        </label>
                    </div>
                </div>
                <div class="mb-3" style="width:20%;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                        value="on" name="isB3" id="flexCheckDefault"  @if(old('isA1', $checkseats->isB3 )) checked disabled readonly @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            B3
                        </label>
                    </div>
                </div>
                <div class="mb-3" style="width:20%;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                        value="on" name="isB4" id="flexCheckDefault"  @if(old('isA1', $checkseats->isB4 )) checked disabled readonly @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            B4
                        </label>
                    </div>
                </div>
                <div class="mb-3" style="width:20%;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                        value="on" name="isB5" id="flexCheckDefault"  @if(old('isA1', $checkseats->isB5 )) checked disabled readonly @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            B5
                        </label>
                    </div>
                </div>
            </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>    
</div>
@endsection
