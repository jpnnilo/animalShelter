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
    
    <div class="form-group  mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >{{ isset($disease) ? $disease->description : ''}}</textarea>
      @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-success">Submit</button>
   <button type="reset" onclick="location.href='/disease'" class="btn btn-secondary">Cancel</button>
  </form>
</div>  
@endsection