@extends('layouts.master')
@section('content')
    <H2 class="header">{{ $header }}</H2>
    @auth
    <div class="create"><a href="{{ route('animal.create') }}"><button type="button" class="btn btn-primary create__elem">Create</button></a></div>
    @endauth
    <div class="row ">

        @foreach ($listings as $list)
            <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                
                    <div class="card">
                        <img src="{{ isset($list->animalImages->image) ? url('storage/'.$list->animalImages->image) : url('images/noImage.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $list->name }}</h5>
                            <p class="card-text">Age: {{ $list->age }}</p>
                            <p class="card-text">Gender: {{ $list->gender }}</p>
                            <p class="card-text">Type: {{ $list->type }}</p>
                            <p class="card-text">Breed: {{ $list->breed }}</p>
                            <a href="{{ route('animal.show', $list->id) }}"><button type="button" Class="btn btn-success">View</button></a>
                            @auth
                            <a href="{{ route('animal.edit', [$list->id]) }}"><button type="button" Class="btn btn-warning">Edit</button></a>
                            <form method="POST" action="{{ route('animal.destroy' , [$list->id]) }}" > 
                                @csrf 
                                @method('DELETE') 
                                <button type="submit" Class="btn btn-danger">Delete</button>
                            </form>
                            @endauth
                            
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection


@section('css')
<style>
    *{
        border:0px;
        margin:0px;
        padding:0px;
    }
    .header{
        text-align:center;
        margin: 30px 0;
    }
   
    form{
        display:inline-block;
    }


    
    .card-body{
        height: 270px;
        margin:10px;
    }
    .card-text{
        margin:5px;
    }

    
    .btn{
        margin: 2px;
        width:auto;
    }

    .create__elem{
        display:block;
        margin:10px auto;
    }
    
    
</style>
@endsection