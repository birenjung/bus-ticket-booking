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
    <h2 class="text-center my-5">Bus Features</h2>
    <div class="bus_features">
        <div class="container-fluid d-flex justify-content-evenly">
            <div class="card" style="width: 18rem;">
                <img src="https://www.gokyotreksnepal.com/wp-content/uploads/2018/06/tourist-bus-service.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tourist Bus</h5>
                    <ul class="bus_features_list">
                        <li>Wi-fi</li>
                        <li>A/C and Fan System</li>
                        <li>Music System</li>
                        <li>Comfortable Seats</li>
                        <li>First Aid Kits</li>
                        <li>Mobile Charger</li>
                        <li>Mineral Water</li>
                        <li>Experienced and Friendly Staffs</li>
                        <li>On Time Departure</li>
                    </ul>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="https://www.gokyotreksnepal.com/wp-content/uploads/2018/06/tourist-bus-service.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tourist Bus</h5>
                    <ul class="bus_features_list">
                        <li>Wi-fi</li>
                        <li>A/C and Fan System</li>
                        <li>Music System</li>
                        <li>Comfortable Seats</li>
                        <li>First Aid Kits</li>
                        <li>Mobile Charger</li>
                        <li>Mineral Water</li>
                        <li>Experienced and Friendly Staffs</li>
                        <li>On Time Departure</li>
                    </ul>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="https://www.gokyotreksnepal.com/wp-content/uploads/2018/06/tourist-bus-service.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tourist Bus</h5>
                    <ul class="bus_features_list">
                        <li>Wi-fi</li>
                        <li>A/C and Fan System</li>
                        <li>Music System</li>
                        <li>Comfortable Seats</li>
                        <li>First Aid Kits</li>
                        <li>Mobile Charger</li>
                        <li>Mineral Water</li>
                        <li>Experienced and Friendly Staffs</li>
                        <li>On Time Departure</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
