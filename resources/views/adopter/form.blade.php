@extends('layouts.master')

@section('content')

<div class="container">
<H2 class="header">{{ $header }}</H2>
  <form method="POST" action="{{  isset($adopter) ? route('adopter.update', [$adopter->id]) :  route('adopter.store')  }}">
    @if (isset($adopter))
        @method('PUT')
    @endif
    @csrf
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Name: </label>
      <input type="text" class="form-control" name="name" value="{{ isset($adopter) ? $adopter->name : ''}}">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Email: </label>
      <input type="email" class="form-control" name="email" value="{{ isset($adopter) ? $adopter->email : ''}}">
      @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Age: </label>
      <input type="text" class="form-control" name="age" value="{{ isset($adopter) ? $adopter->age : ''}}">
      @error('age')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <label for="recipient-name" class="col-form-label">Gender: </label>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male"{{ isset($adopter) && ($adopter->gender == 'Male') ? 'checked' : '' }}> 
      <label class="form-check-label" for="radio1">Male </label> 
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female" {{ isset($adopter) ? $gender = $adopter->gender : $gender = '' }} {{ ($gender == 'Female') ? 'checked': '' }} >
      <label class="form-check-label" for="radio2">Female</label>
    </div>
    @error('gender')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Address:  </label>
      <input type="text" class="form-control" name="address" value="{{ isset($adopter) ? $adopter->address : ''}}" >
      @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    
    
  

    <button type="submit" class="btn btn-success">Submit</button>
   <button type="reset" onclick="location.href='/adopter/list'" class="btn btn-secondary">Cancel</button>
  </form>
</div>  
@endsection

@section('css')
    <style>

      .header{
          text-align:center;
          margin: 20px 0;
      }   
    </style>
@endsection