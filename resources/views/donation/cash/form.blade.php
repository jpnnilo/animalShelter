@extends('layouts.master')

@section('content')

<div class="container">
<H2>{{ $header }}</H2>
  <form method="POST" action="{{  isset($cashdonation) ? route('cashdonation.update', [$cashdonation->id]) :  route('cashdonation.store')  }}">
    @if (isset($cashdonation))
        @method('PUT')
    @endif
    @csrf
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Donor Name: </label>
      <input type="text" class="form-control" name="name" value="{{ isset($cashdonation) ? $cashdonation->donor : ''}}">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Amount: </label>
      <input type="text" class="form-control" name="amount" value="{{ isset($cashdonation) ? $cashdonation->amount : ''}}">
      @error('amount')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Date:  </label>
      <input type="date" class="form-control" name="date" value="{{ isset($cashdonation) ? $cashdonation->date : ''}}" >
      @error('date')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
   <button type="reset" onclick="location.href='/cashdonation'" class="btn btn-secondary">Cancel</button>
  </form>
</div>  
@endsection