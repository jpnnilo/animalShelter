@extends('layouts.master')

@section('content')
    <h3>{{ $header }}</h3>

    <div style="margin-bottom: 40px;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                Name:<h5 class="card-title"> {{ $rescuer->name }}</h5>
                Age: <h5 class="card-text"> {{ $rescuer->age }}</h5>
                Gender:<h5 class="card-text">{{ $rescuer->gender }}</h5>

            </div>
        </div>
    </div>

    <h4 style="margin-bottom: 20px;">Animal Rescued</h4>
    <div class="row ">
        @forelse($rescuer->animals as $animals)
            <div class="col-sm-3">

                <div class="card" style="width: 18rem; margin-bottom: 20px;">
                    <div class="card-body" >
                
                        Name: <h5 class="card-title">{{ $animals->name }}</h5>
                        <p class="card-text">Age: {{ $animals->age }}</p>
                        <p class="card-text">Type: {{ $animals->type }}</p>
                        <p class="card-text">Rescued at: {{ $animals->location }}</p>
                        <a href="#" class="btn btn-dark disabled">View Animal Status</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No Animal Rescued</p>
        @endforelse


    </div>
@endsection
