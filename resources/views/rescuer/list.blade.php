@extends('layouts.master')

@section('content')
    <H2>{{ $header }}</H2>
    <div class="row text-center">
        @foreach ($listings as $list)
            <div class="col-sm-4"><a href="{{ route('rescuer.show', $list->id) }}">{{ $list->name }} {{ $list->age }}</a>
            </div>
        @endforeach
    </div>
    </div>
@endsection
