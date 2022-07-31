@extends('layouts.master')
@section('content')



<a href="{{ route('animal.create') }}"><button type="button" class="btn btn-primary" >Add</button></a>

<H2>{{ $header }}</H2>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th>Name</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Breed</th>
      <th>Type</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($listings as $list)
      <tr>
        <td>{{ $list->name }}</td>
        <td>{{ $list->age }}</td>
        <td>{{ $list->gender }}</td>
        <td>{{ $list->breed }}</td>
        <td>{{ $list->type }}</td>
        <td></td>
        <td><a href="{{ route('animal.edit', [$list->id]) }}"><button type="button" class="btn btn-success">Edit</button></a> 
          <form method="POST" action="{{ route('animal.destroy' , [$list->id]) }}" > @csrf 
            @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button></form></td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
