@extends('layouts.master')

@section('content')

<div class="container">
<H2>{{ $header }}</H2>
  <form method="POST" action="{{  isset($employee) ? route('employee.update', [$employee->id]) :  route('employee.store')  }}">
    @if (isset($employee))
        @method('PUT')
    @endif
    @csrf
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Name: </label>
      <input type="text" class="form-control" name="name" value="{{ isset($employee) ? $employee->name : ''}}">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Age: </label>
      <input type="text" class="form-control" name="age" value="{{ isset($employee) ? $employee->age : ''}}">
      @error('age')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <label for="recipient-name" class="col-form-label">Gender: </label>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male"{{ isset($employee) && ($employee->gender == 'Male') ? 'checked' : '' }}> 
      <label class="form-check-label" for="radio1">Male </label> 
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female" {{ isset($employee) ? $gender = $employee->gender : $gender = '' }} {{ ($gender == 'Female') ? 'checked': '' }} >
      <label class="form-check-label" for="radio2">Female</label>
    </div>
    @error('gender')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    
    <div class="form-group">
      <label class="form-label">Employee Type:</label>
      <select class="form-select" id="type" name="type">
        <option value="">---Select option---</option>
        <option {{ isset($employee) && ($employee->type == "Veterinarian") ? 'selected="selected"' : ''}}>Veterinarian</option>
        <option {{ isset($employee) && ($employee->type == "Caretaker") ? 'selected="selected"' : ''}}>Caretaker</option>
      </select>
      @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror 
    </div> 
    
    <button type="submit" class="btn btn-success">Submit</button>
   <button type="reset" onclick="location.href='/employee'" class="btn btn-secondary">Cancel</button>
  </form>
</div>  
@endsection