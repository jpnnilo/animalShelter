@extends('layouts.master')

@section('content')
    <H2 class="header">{{ $header }}</H2>
    <div class="create"><a href="{{ route('adopter.create') }}"><button type="button" class="btn btn-primary create__elem">Create</button></a></div>
    <div class="row ">
        @foreach ($listings as $list)
        <div class="col-lg-3 col-md-4 col-sm-6 my-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $list->name }}</h5>
                    <p class="card-text">Age: {{ $list->age }}</p>
                    <p class="card-text">Gender: {{ $list->gender }}</p>
                    <p class="card-text">Address: {{ $list->address }}</p>
                   
                    <a href="{{ route('adopter.show', $list->id) }}"><button type="button" Class="btn btn-success">View</button></a>
                    <a href="{{ route('adopter.edit', [$list->id]) }}"><button type="button" Class="btn btn-warning">Edit</button></a>
                    <form method="POST" action="{{ route('adopter.destroy' , [$list->id]) }}" > 
                        @csrf 
                        @method('DELETE') 
                        <button type="submit" Class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
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
        height: 290px;
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