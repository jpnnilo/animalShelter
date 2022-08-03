@extends('layouts.master')

@section('content')

<div class="container">
<H2>{{ $header }}</H2>
  <form method="POST" action="{{  isset($materialdonation) ? route('materialdonation.update', [$materialdonation->id]) :  route('materialdonation.store')  }}">
    @if (isset($materialdonation))
        @method('PUT')
    @endif
    @csrf
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Donor Name: </label>
      <input type="text" class="form-control" name="name" value="{{ isset($materialdonation) ? $materialdonation->donor : ''}}">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Item: </label>
      <input type="text" class="form-control" name="item" value="{{ isset($materialdonation) ? $materialdonation->item : ''}}">
      @error('item')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Quantity:  </label>
      <input type="text" class="form-control" name="quantity" value="{{ isset($materialdonation) ? $materialdonation->quantity : ''}}" >
      @error('quantity')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Date:  </label>
      <input type="date" class="form-control" name="date" value="{{ isset($materialdonation) ? $materialdonation->date : ''}}" >
      @error('date')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
   <button type="reset" onclick="location.href='/materialdonation'" class="btn btn-secondary">Cancel</button>
  </form>
</div>  
@endsection