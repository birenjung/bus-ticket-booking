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
            <div class="container-fluid d-flex justify-content-evenly flex-wrap">
                @foreach ($buses as $bus)
                    <div class="card m-3" style="width: 18rem;">
                        <a href="/select-seats/{{ $bus->id }}/{{ date('Y-m-d') }}"
                            style="text-decoration: none; color:black;"><img src="{{ $bus->image }}" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <p class="text-center" style="font-weight: bold;">Ratings <br>
                                    {{$bus['average_rating']}}/5 <i class="fa-solid fa-star"></i>
                                </p>
                                <h4 class="card-title text-center">{{ $bus->bus_name }}</h4>
                                <h5 class="card-title text-center">{{ $bus->bus_type }}</h5>
                                @if (auth()->user())
                                <p style="text-align: right"> Your rating <br>
                                    @if (!$bus['ratingg'])
                                        0/5 <i class="fa-solid fa-star"></i>
                                </p>
                            @else
                                {{ $bus['ratingg'] }}/5 <i class="fa-solid fa-star"></i></p>                                    
                                @endif
                @endif

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
            <div class="card-footer text-center">
                <p>Bus Fare : Rs. {{ $bus->price }}</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal-{{ $bus->id }}">
                    Rate
                </button>
            </div>
        </div>


        <?php
                if(auth()->user())
                {
                    ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{ $bus->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Rate {{ $bus->bus_name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('rating') }}" method="post">
                            @csrf
                            <input type="hidden" name="bus_id" value="{{ $bus->id }}">
                            <div class="d-flex justify-content-around mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" value="1"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" value="2"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" value="3"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        3
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" value="4"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        4
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rating" value="5"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        5
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
        ?>
        @endforeach
        </div>
    </section>
@endsection
