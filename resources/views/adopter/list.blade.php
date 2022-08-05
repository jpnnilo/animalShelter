@extends('layouts.master')

@section('content')
    <H2 style="margin-bottom: 30px;">{{ $header }}</H2>
    <div class="row ">
        @foreach ($listings as $list)
        <div class="col-sm-3">
            <div class="card" style="width: 18rem; margin-bottom: 30px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $list->name }}</h5>
                    <p class="card-text">Age: {{ $list->age }}</p>
                    <p class="card-text">Gender: {{ $list->gender }}</p>
                    <p class="card-text">Address: {{ $list->address }}</p>
                    <a href="{{ route('adopter.show', $list->id) }}" class="btn btn-dark">View Animal Adopted</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
