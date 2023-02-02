@extends('layouts.frontend')

@section('title')
    Home Page
@endsection

@section('content')
<section class="hero_area">
    <div class="search_form text-white">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Leaving from :</label>
                <input type="text" class="form-control" placeholder="Itahari">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">To destination :</label>
                <input type="text" class="form-control" placeholder="Kathmandu">
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
                <img src="{{ $bus->image }}"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">{{ $bus->bus_name }}</h4>
                    <h5 class="card-title">{{ $bus->bus_type }}</h5>
                    <div class="bus-features">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @if(old('isWifi', $bus->isWifi)) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                              Wifi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @if(old('isACfan', $bus->isACfan)) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                              A/C and Fan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @if(old('isMusic', $bus->isMusic)) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                              Music
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @if(old('isComfortSeat', $bus->isComfortSeat)) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                              Comfortable Seats
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @if(old('isFirstAid', $bus->isFirstAid)) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                              First Aid Kits
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @if(old('isComfortSeat', $bus->isComfortSeat)) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                              Comfortable Seats
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @if(old('isWater', $bus->isWater)) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                              Mineral Water
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @if(old('isCharger', $bus->isCharger)) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                              Mobile Charger
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @if(old('isTV', $bus->isTV)) checked @endif>
                            <label class="form-check-label" for="flexCheckDefault">
                              TV
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach     
    </div>
</section>

@endsection
