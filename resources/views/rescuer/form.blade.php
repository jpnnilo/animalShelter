@extends('layouts.master')

@section('content')
 

<div class="container">
  <H2>{{ $header }}</H2>
  <form method="POST" action="{{  isset($rescuer) ? route('rescuer.update', [$rescuer->id]) :  route('rescuer.store')  }}">
    @if (isset($rescuer))
      @method('PUT')
    @endif

    @csrf
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Name: </label>
      <input type="text" class="form-control" name="name" value="{{ isset($rescuer) ? $rescuer->name : ''}}">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Age: </label>
      <input type="text" class="form-control" name="age" value="{{ isset($rescuer) ? $rescuer->age : ''}}">
      @error('age')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <label for="recipient-name" class="col-form-label">Gender: </label>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male"{{ isset($rescuer) && ($rescuer->gender == 'Male') ? 'checked' : '' }}> 
      <label class="form-check-label" for="radio1">Male </label> 
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female" {{ isset($rescuer) ? $gender = $rescuer->gender : $gender = '' }} {{ ($gender == 'Female') ? 'checked': '' }} >
      <label class="form-check-label" for="radio2">Female</label>
    </div>
    @error('gender')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <div>
      <button type="submit" class="btn btn-success">Submit</button>
      <button type="reset" onclick="location.href='{{ route('rescuer.index') }}'" class="btn btn-secondary">Cancel</button>
    </div>  
  </form>
</div>  
@endsection