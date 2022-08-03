@extends('layouts.master')
@section('content')


<div class="container">

<H2 >{{ $header }}</H2>
<div class="float-end "><a href="{{ route('materialdonation.create') }}"><button type="button" class="btn btn-primary">Create</button></a></div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>Donor Name</th>
      <th>Item</th>
      <th>Quantity</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($listings as $list)
      <tr>
        <td>{{ $list->donor }}</td>
        <td>{{ $list->item }}</td>
        <td>{{ $list->quantity }}</td>
        <td>{{ $list->date }}</td>
        <td>
          <a href="{{ route('materialdonation.edit', [$list->id]) }}"><button type="button" class="btn btn-success">Edit</button></a> 
          <form method="POST" action="{{ route('materialdonation.destroy' , [$list->id]) }}" > @csrf 
            @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
