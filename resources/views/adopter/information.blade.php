@extends('layouts.master')

@section('content')
    <h3 class="header">{{ $header }}</h3>

    <div style="margin-bottom: 40px;">
        <div class="card card-details" style="width: 18rem;">
            <img src="/images/blank-profile.png">      
            <div class="card-body">
                <h5 class="card-title"> <span>Name: </span> {{ $adopter->name }}</h5>
                <h5 class="card-text"> <span>Age: </span>{{ $adopter->age }}</h5>
                <h5 class="card-text"> <span>Gender: </span>{{ $adopter->gender }}</h5>
                <h5 class="card-text"> <span>Address: </span>{{ $adopter->address }}</h5>
                <P hidden>{{$adopt = count($adopter->animals) }}</P> 
                <h5 class="card-text"> <span>Adopted: </span>{{ ($adopt == 0) ? 0 : $adopt }}</h5>
            </div>
        </div>
    </div>


    <h4>{{ (count($adopter->animals) == 0) ? '' : 'Adopted Animals' }}</h4>
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

        @endforelse


    </div>
@endsection

@section('css')
<style>

    .card-details{
        margin: 20px auto;
    }

    .header{
        text-align:center;
        margin: 20px 0;
    }    

    
    .card-text{
        font-size: 15px;
        margin:10px 0;
    }

    .card-body span{
        font-weight: normal;
    }
  
</style>
@endsection


@section('js')
    <script>
        
    </script>
@endsection