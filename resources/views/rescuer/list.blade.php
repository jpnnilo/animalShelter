@extends('layouts.master')

@section('content')
    <H2 style="margin-bottom: 30px;">{{ $header }}</H2>
    <div class="row ">
        @foreach ($listings as $list)
        <div class="col-sm-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $list->name }}</h5>
                    <p class="card-text">Age: {{ $list->age }}</p>
                    <p class="card-text">Gender: {{ $list->gender }}</p>
                    <a href="{{ route('rescuer.show', $list->id) }}" class="btn btn-dark">View Animal Rescued</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
