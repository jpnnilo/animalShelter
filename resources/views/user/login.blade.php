@extends('layouts.master')

@section('content')

<section class="vh-100" >
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
  
                  <form class="mx-1 mx-md-4" action="{{ route('login') }}" method="POST">
                    @csrf
                      <div class="form-group">
                    
                        <input type="email" id="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Email</label>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                   
                    
  
                      <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                     
             
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">Login</button>
                    </div>
  
                  </form>
                  <div class="d-flex justify-content-center">
                     <a href="{{ route('user.registerView') }}"><p id="signup">Not a member? Signup</p></a>
                  </div>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="{{ url('images/animalCartoon.png') }}"
                    class="img-fluid" alt="Sample image">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('css')
    <style>
      #signup{
        display:block;
        margin: 0 auto;
      }
    </style>
@endsection