@extends('layouts.master')

@section('content')
    <h3>{{ $header }}</h3>

    <div style="margin-bottom: 40px;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                Name:<h5 class="card-title"> {{ $adopter->name }}</h5>
                Age: <h5 class="card-text"> {{ $adopter->age }}</h5>
                Gender:<h5 class="card-text">{{ $adopter->gender }}</h5>
                Address:<h5 class="card-text">{{ $adopter->address }}</h5>

            </div>
        </div>
    </div>

    <h4 style="margin-bottom: 20px;">Adopted Animals</h4>
    <div class="row ">
        @forelse($adopter->animals as $animals)
            <div class="col-sm-3">

                <div class="card" style="width: 18rem; margin-bottom: 20px;">
                    <div class="card-body" >
                        Name: <h5 class="card-title">{{ $animals->name }}</h5>
                        <p class="card-text">Age: {{ $animals->age }}</p>
                        <p class="card-text">Type: {{ $animals->type }}</p>
                        <p class="card-text">Gender: {{ $animals->gender }}</p>
                        <p class="card-text">Breed: {{ $animals->breed }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No Adopted Animal</p>
        @endforelse


    </div>
@endsection
