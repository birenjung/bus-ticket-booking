@extends('layouts.frontend')

@section('title')
    Search Results
@endsection

@section('content')

    <section class="bus_features_section mt-5">
        <h2 class="text-center my-5">Your Search Results</h2>
        <div class="bus_features">
            <div class="container-fluid d-flex justify-content-evenly">
                <p class="text-danger">No any match.</p>
                @isset($buses)
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
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach                    
                @endisset
            </div>
    </section>

@endsection
