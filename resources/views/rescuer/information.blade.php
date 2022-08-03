@extends('layouts.master')

@section('content')
<h3>{{ $header }}</h3>


Name: {{ $rescuer->name  }} <br>
Age : {{ $rescuer->age }}

<div class="row ">

<h5>Animals Rescued</h5>
@foreach ($rescuer->animals as $animals)
        
        <div class="col-sm-4">
        
        Animal Name: {{ $animals->name }} <br>
        Type: {{ $animals->type }} <br>
        Breed: {{ $animals->breed }}<br>
        Located: {{  $animals->location }}<br>
        <br>
        </div>
    
@endforeach
</div>


@endsection
    
