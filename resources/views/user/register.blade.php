@extends('layouts.master')

@section('content')
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>

                                    <form class="mx-1 mx-md-4" action="{{ route('user.register') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label class="form-label" for="name">Your Name</label>
                                            <input type="text" id="name" class="form-control" name="name" />
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="email">Your Email</label>
                                            <input type="email" id="email" class="form-control" name="email" />
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control" name="password" />
                                          
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" />
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="{{ url('images/animalCartoon.png') }}" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
