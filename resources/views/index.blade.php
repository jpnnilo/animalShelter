@extends('layouts.master')

@section('content')
    <h3>ANIMAL SHELTER</h3>

    <h4>Adoptable Animals</h4>
    <div class="row adoptable-list">
        {{-- insert adoptable() from js --}}
    </div>

    {{-- Dog/Cat details --}}

    <!-- Modal 1-->
    <div class="modal fade modal1" id="adopt-modal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adopt</h5>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="{{ url('images/dog1.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="col">
                            <h4 class="modal-details"> {{-- Dog/Cat details --}} </h4>
                            <div class="form-group">
                                <label class="col-form-label">Name: </label>
                                <input type="text" class="form-control" name="name" id="name" value=""
                                    disabled>
                            </div>
                            <div class="alert alert-danger"></div>

                            <div class="form-group">
                                <label class="col-form-label">Age: </label>
                                <input type="text" class="form-control" name="age" id="age" value=""
                                    disabled>
                            </div>
                            <div class="alert alert-danger"></div>

                            <div class="form-group">
                                <label class="col-form-label">Breed: </label>
                                <input type="text" class="form-control" name="breed" id="breed" value=""
                                    disabled>
                            </div>
                            <div class="alert alert-danger"></div>


                            <div class="form-group">
                                <label class="col-form-label">Gender: </label>
                                <input type="text" class="form-control" name="gender" id="gender" value=""
                                    disabled>
                            </div>
                            <div class="alert alert-danger"></div>


                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary next" data-bs-toggle="modal"
                        data-bs-target="#adopt-modal-2" data-bs-dismiss="modal">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 for adopter details-->
    <div class="modal fade modal2" id="adopt-modal-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Enter Details to Adopt</h4>
                </div>
                <div class="container">
                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                                <label class="col-form-label">Name: </label>
                                <input type="text" class="form-control" name="name" id="name" value="">
                            </div>
                            <div class="alert alert-danger alert-name"></div>

                            <div class="form-group">
                                <label class="col-form-label">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" 
                                    placeholder="Email">
                            </div>
                            <div class="alert alert-danger alert-email"></div>

                            <div class="form-group">
                                <label class="col-form-label">Age: </label>
                                <input type="text" class="form-control" name="age" id="age" value="">
                            </div>
                            <div class="alert alert-danger alert-age"></div>

                            <label for="recipient-name" class="col-form-label">Gender: </label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="gender1" class="gender" name="gender" value="Male">
                                <label class="form-check-label" for="gender">Male </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="gender2" class="gender" name="gender" value="Female">
                                <label class="form-check-label" for="gender">Female</label>
                            </div>
                            <div class="alert alert-danger alert-gender"></div>

                            <div class="form-group">
                                <label class="col-form-label">Address: </label>
                                <input type="text" class="form-control" name="address" id="address">
                            </div>
                            <div class="alert alert-danger alert-address"></div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary adopt" data-id="">Adopt</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('.alert').hide();
            adoptable();

            function adoptable() {
                $.ajax({
                    type: "GET",
                    url: "/api/",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $.each(response.adoptables, function(key, adoptable) {
                            $('.adoptable-list').append('\
                                <div class="col-lg-3 card-adoptable'+adoptable.id+'">\
                                    <div class="card" style="width: 18rem;">\
                                        <img src="{{ url('images/dog1.jpg') }}" class="card-img-top" alt="...">\
                                        <div class="card-body">\
                                            <h5 class="card-title">' + adoptable.name + '</h5>\
                                            <p class="card-text">' + adoptable.type + '</p>\
                                            <p class="card-text">Breed: ' + adoptable.breed + '</p>\
                                            <p class="card-text">Age: ' + adoptable.age +
                                '</p>\
                                            <button type="button" class="btn btn-primary view" data-bs-toggle="modal" data-bs-target="#adopt-modal-1" data-id="' +
                                adoptable.id + '">Adopt</button>\
                                        </div>\
                                        </div>\
                                    </div>');
                        });


                    }
                });

            }

            $(document).on('click', '.view', function() {
                console.log("pumasok sa view");

                var animal_id = $(this).data("id");
                console.log(animal_id);
                $.ajax({
                    type: "get",
                    url: "/api/animal/details/" + animal_id,
                    datatype: "json",
                    success: function(response) {
                        console.log(response);
                        $('.modal1 .modal-details').text(response.animal.type + " Details");
                        $('.modal1 #name').val(response.animal.name);
                        $('.modal1 #age').val(response.animal.age);
                        $('.modal1 #breed').val(response.animal.breed);
                        $('.modal1 #gender').val(response.animal.gender);
                        $('.adopt').data('id', response.animal.id);

                    }
                })
            });

            $(document).on('click', '.adopt', function() {
                var animal_id = $(this).data('id');
                var name = $('.modal2 #name').val();
                var email = $('.modal2 #email').val();
                var age = $('.modal2 #age').val();
                var gender = $('.modal2 input[name="gender"]:checked').val();
                var address = $('.modal2 #address').val();
                
                var data = {
                    'animal_id': animal_id,
                    'name': name,
                    'age' : age,
                    'email': email,
                    'gender': gender,
                    'address' : address

                }
                console.log(data);
                $.ajax({
                    type: "POST",
                    url: "/api/animal/details/adopt",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#adopt-modal-2').modal('toggle');
                        $('.card-adoptable'+response.animal_id).remove();
                        alert(response.message);

                    },
                    error:function(err){
                        console.log(err);
                        if(err.responseJSON.errors.email != null){
                            $('.alert-email').text(err.responseJSON.errors.email).fadeIn().delay(3000).fadeOut('slow');
                        }
                        if(err.responseJSON.errors.name != null){
                            $('.alert-name').text(err.responseJSON.errors.name).fadeIn().delay(3000).fadeOut('slow');
                        }
                        
                        if(err.responseJSON.errors.age != null){
                            $('.alert-age').text(err.responseJSON.errors.age).fadeIn().delay(3000).fadeOut('slow');
                        }
                        
                        if(err.responseJSON.errors.gender != null){
                            $('.alert-gender').text(err.responseJSON.errors.gender).fadeIn().delay(3000).fadeOut('slow');
                        }
                    
                        if(err.responseJSON.errors.address != null){
                            $('.alert-address').text(err.responseJSON.errors.address).fadeIn().delay(3000).fadeOut('slow');
                        }
                        
                    }
                })

            });

        });
    </script>
@endsection
