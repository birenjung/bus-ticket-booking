@extends('layouts.frontend')

@section('title')
    Search Results
@endsection


@section('content')

    <section class="bus_features_section mt-5">
        <h2 class="text-center my-5">Buses for <strong> {{ $query }} </strong> for the date <strong>
                {{ $date }} </strong></h2>
        <div class="bus_features">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Bus Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Route</th>
                            <th scope="col">Departure</th>
                            {{-- <th scope="col">Available</th> --}}
                            <th scope="col">Fare</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sn = 1;
                        @endphp
                        @if (count($buses) < 1)
                            <tr>
                                <td colspan="6">
                                    <p class="text-center text-danger">No match found.</p>
                                </td>
                            </tr>
                        @else
                            @foreach ($buses as $bus)
                                <tr>
                                    <td>{{ $sn++ }}</td>

                                    <td>{{ $bus->bus_name }}</td>

                                    <td>{{ $bus->bus_type }}</td>

                                    <td>{{ $bus->route_name }}</td>

                                    <td>{{$bus->departure}}</td>                                   

                                    <td>{{ $bus->price }}</td>

                                    <td><a href="/select-seats/{{ $bus->id }}/{{ $date }}"><button
                                                class="btn btn-sm btn-outline-primary">Select</button></a></td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>


            </div>
    </section>
@endsection
