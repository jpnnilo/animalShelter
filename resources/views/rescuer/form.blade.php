@extends('layouts.master')

@section('content')

<H2>{{ $header }}</H2>
<div class="container">
  <form method="POST" action="{{  isset($animal) ? route('animal.update', [$animal->id]) :  route('animal.store')  }}">
    @if (isset($animal))
        @method('PUT')
    @else
        @method('POST')
    @endif

    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif  
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Name: </label>
      <input type="text" class="form-control" name="name" value="{{ isset($animal) ? $animal->name : ''}}">
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Age: </label>
      <input type="text" class="form-control" name="age" value="{{ isset($animal) ? $animal->age : ''}}">
    </div>
    <label for="recipient-name" class="col-form-label">Gender: </label>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male"{{ isset($animal) && ($animal->gender == 'Male') ? 'checked' : '' }}> 
      <label class="form-check-label" for="radio1">Male </label> 
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female" {{ isset($animal) ? $gender = $animal->gender : $gender = '' }} {{ ($gender == 'Female') ? 'checked': '' }} >
      <label class="form-check-label" for="radio2">Female</label>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Breed:  </label>
      <input type="text" class="form-control" name="breed" value="{{ isset($animal) ? $animal->breed : ''}}" >
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Type:  </label>
      <input type="text" class="form-control" name="type" value="{{ isset($animal) ? $animal->breed : ''}}">
    </div>  
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Status:  </label>
      <input type="text" class="form-control" name="status">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
   <button type="reset" onclick="location.href='/animal'" class="btn btn-secondary">Cancel</button>
  </form>
</div>  
@endsection