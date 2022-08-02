@extends('layouts.master')

@section('content')

<div class="container">
<H2>{{ $header }}</H2>
  <form method="POST" action="{{  isset($disease) ? route('disease.update', [$disease->id]) :  route('disease.store')  }}">
    @if (isset($disease))
        @method('PUT')
    @endif
    @csrf
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Name: </label>
      <input type="text" class="form-control" name="name" value="{{ isset($disease) ? $disease->name : ''}}">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Age: </label>
      <input type="text" class="form-control" name="age" value="{{ isset($disease) ? $disease->age : ''}}">
      @error('age')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <label for="recipient-name" class="col-form-label">Gender: </label>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male"{{ isset($disease) && ($disease->gender == 'Male') ? 'checked' : '' }}> 
      <label class="form-check-label" for="radio1">Male </label> 
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female" {{ isset($disease) ? $gender = $disease->gender : $gender = '' }} {{ ($gender == 'Female') ? 'checked': '' }} >
      <label class="form-check-label" for="radio2">Female</label>
    </div>
    @error('gender')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Breed:  </label>
      <input type="text" class="form-control" name="breed" value="{{ isset($disease) ? $disease->breed : ''}}" >
      @error('breed')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label class="form-label">Animal Type:</label>
      <select class="form-select" id="type" name="type">
        <option value="">---Select Option---</option>
        <option {{ isset($disease) && ($disease->type == "Dog") ? 'selected="selected"' : ''}}>Dog</option>
        <option {{ isset($disease) && ($disease->type == "Cat") ? 'selected="selected"' : ''}}>Cat</option>
      </select>
      @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror 
    </div> 
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Status:  </label>
      <input type="text" class="form-control" name="status">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
   <button type="reset" onclick="location.href='/disease'" class="btn btn-secondary">Cancel</button>
  </form>
</div>  
@endsection