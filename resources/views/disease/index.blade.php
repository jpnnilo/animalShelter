@extends('layouts.master')
@section('content')


<div class="container">

<H2 >{{ $header }}</H2>
<div class="float-end "><a href="{{ route('disease.create') }}"><button type="button" class="btn btn-primary">Create</button></a></div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>Name</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($listings as $list)
      <tr>
        <td>{{ $list->name }}</td>
        <td>{{ $list->description }}</td>
        <td>
          <a href="{{ route('disease.edit', [$list->id]) }}"><button type="button" class="btn btn-success">Edit</button></a> 
          <form method="POST" action="{{ route('disease.destroy' , [$list->id]) }}" > @csrf 
            @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection
