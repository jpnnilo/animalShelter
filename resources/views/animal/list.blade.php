@extends('layouts.master')
@section('content')
    <H2 style="margin-bottom: 30px;">{{ $header }}</H2>
    <div class="row ">
        @foreach ($listings as $list)
            <div class="col-sm-3">
                <a href="{{ route('animal.show', $list->id) }}" style="text-decoration: none; color: black;">
                    <div class="card" style="width: 18rem; margin-bottom: 30px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $list->name }}</h5>
                            <p class="card-text">Age: {{ $list->age }}</p>
                            <p class="card-text">Gender: {{ $list->gender }}</p>
                            <p class="card-text">Type: {{ $list->type }}</p>
                            <p class="card-text">Breed: {{ $list->breed }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
