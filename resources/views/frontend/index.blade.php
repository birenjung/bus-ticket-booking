@extends('layouts.frontend')

@section('title')
    Home Page
@endsection

@section('content')
    <section class="hero_area">
        <div class="search_form text-white">
            <form method="GET" action="/search">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Search Bus Routes :</label>
                    <input type="text" class="form-control" placeholder="Itahari to Kathmandu" name="search_bus">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Travel Date :</label>
                    <input type="date" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Find Bus</button>
            </form>
        </div>
    </section>

    <section class="bus_features_section mt-5">
        <h2 class="text-center my-5"> Our Buses</h2>
        <div class="bus_features">
            <div class="container-fluid d-flex justify-content-evenly">
                @foreach ($buses as $bus)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $bus->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $bus->bus_name }}</h4>
                            <h5 class="card-title text-center">{{ $bus->bus_type }}</h5>
                            <p><strong>{{ $bus->route_name }}</strong></p>
                            <div class="bus-features">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isWifi', $bus->isWifi)) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Wifi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isACfan', $bus->isACfan)) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        A/C and Fan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isMusic', $bus->isMusic)) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Music
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isComfortSeat', $bus->isComfortSeat)) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Comfortable Seats
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isFirstAid', $bus->isFirstAid)) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        First Aid Kits
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isComfortSeat', $bus->isComfortSeat)) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Comfortable Seats
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isWater', $bus->isWater)) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Mineral Water
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isCharger', $bus->isCharger)) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Mobile Charger
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isTV', $bus->isTV)) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        TV
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p>Bus Fare : Rs. {{ $bus->price }}</p>
                            <!-- Button trigger modal -->
                            <p class="text-center"><button type="button" class="btn btn-sm btn-outline-primary"
                                    data-bs-toggle="modal" data-bs-target="#a{{ $bus->id }}">
                                    Buy Ticket
                                </button></p>

                            <!-- Modal -->
                            <div class="modal fade" id="a{{ $bus->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                @if (auth()->user())
                                                    Fill the form to buy ticket.
                                                @else
                                                    <p>Please login to buy ticket.</p>
                                                @endif
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if (auth()->user())
                                                <form action="{{route('store.buy')}}" method="POST">
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
                                                        <label class="form-label">Date</label>
                                                        <input type="date" class="form-control" name="date">                                                        
                                                    </div>                                             
                                                    <div class="mb-3">
                                                        <label class="form-label">Date</label>
                                                        <input type="hidden" class="form-control" name="bus_id" value="{{$bus->id}}">                                                        
                                                    </div>                                             
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            @else
                                                <div class="auth">
                                                    <a href="{{ route('register') }}"
                                                        style="margin-right: 20px">Register</a>
                                                    <a href="{{ route('login') }}">Login</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
