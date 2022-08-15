@extends('layouts.master')
@section('content')

<div class="container">
<H2 >{{ $header }}</H2>
<div class="float-end "><a href="{{ route('adopter.create') }}"><button type="button" class="btn btn-primary">Create</button></a></div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>Name</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Address</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($listings as $list)
      <tr>
        <td>{{ $list->name }}</td>
        <td>{{ $list->age }}</td>
        <td>{{ $list->gender }}</td>
        <td>{{ $list->address }}</td>
        <td>
          <a href="{{ route('adopter.edit', [$list->id]) }}"><button type="button" class="btn btn-success">Edit</button></a> 
          <form method="POST" action="{{ route('adopter.destroy' , [$list->id]) }}" > @csrf 
            @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection
