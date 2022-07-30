@extends('layouts.layout')

@section('content')
<div class="container">
  <h2>Update Animal</h2>
  <form method="POST" action="/animal/{{ $animal->id }}">
    @method('PUT')
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
      <input type="text" class="form-control" name="name" value="{{ $animal->name }}">
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Age: </label>
      <input type="text" class="form-control" name="age" value="{{ $animal->age }}">
    </div>
    <label for="recipient-name" class="col-form-label">Gender: </label>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male" {{  ($animal->gender == "male") ? 'checked' : '' ;  }}>
      <label class="form-check-label" for="radio1">Male</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female" {{ ($animal->gender == "female") ? 'checked' : '' ;  }}>
      <label class="form-check-label" for="radio2">Female</label>
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Breed:  </label>
      <input type="text" class="form-control" name="breed" value="{{ $animal->breed }}">
    </div>
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Type:  </label>
      <input type="text" class="form-control" name="type" value="{{ $animal->type }}">
    </div>  
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Status:  </label>
      <input type="text" class="form-control" name="">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
   <button type="reset" onclick="location.href='/animal'" class="btn btn-secondary">Cancel</button>
  </form>
</div>  
@endsection