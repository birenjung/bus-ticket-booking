@extends('layouts.frontend')

@section('title')
    Home Page
@endsection
@section('content')
    <section class="hero_area">
        <div class="search_form text-white">
            <form method="GET" action="/search">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Search Bus Routes to find buses :</label>
                    <input type="text" class="form-control" placeholder="E.g. Itahari to Kathmandu" name="search_bus">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Travel Date :</label>
                    <input type="date" class="form-control" name="date">
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
                        <a href="/select-seats/{{ $bus->id }}/{{date('Y-m-d')}}" style="text-decoration: none; color:black;"><img src="{{ $bus->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $bus->bus_name }}</h4>
                            <h5 class="card-title text-center">{{ $bus->bus_type }}</h5>
                            <p><strong>{{ $bus['route'] }}</strong></p>
                            <div class="bus-features">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isWifi', $bus->isWifi)) checked @endif disabled readonly>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Wifi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isACfan', $bus->isACfan)) checked @endif disabled readonly>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        A/C and Fan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isMusic', $bus->isMusic)) checked @endif disabled readonly>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Music
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isComfortSeat', $bus->isComfortSeat)) checked @endif disabled readonly>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Comfortable Seats
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isFirstAid', $bus->isFirstAid)) checked @endif disabled readonly>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        First Aid Kits
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isComfortSeat', $bus->isComfortSeat)) checked @endif disabled readonly>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Comfortable Seats
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isWater', $bus->isWater)) checked @endif disabled readonly>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Mineral Water
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isCharger', $bus->isCharger)) checked @endif disabled readonly>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Mobile Charger
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        @if (old('isTV', $bus->isTV)) checked @endif disabled readonly>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        TV
                                    </label>
                                </div>
                            </div>                        
                        </div>
                    </a>
                        <div class="card-footer">
                            <p>Bus Fare : Rs. {{ $bus->price }}</p>                            
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
