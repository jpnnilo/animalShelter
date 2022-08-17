@extends('layouts.master')

@section('content')
    
    
    <h3 class="title">ANIMAL SHELTER</h3>
   
    <h4>Adoptable Animals</h4>
    <div class="row adoptable-list">
        {{-- insert adoptable() from js --}}
    </div>

    {{-- Dog/Cat details --}}
    @include('adopt')

@endsection
@section('css')
<style>
    
    .title{
      text-align:center;
      margin: 30px 0;
    }
    
    .card{
        margin: 10px 0;
        padding: 10px;
    }

    .card-text{
        margin:10px;
    }

</style>
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
                            $('.adoptable-list').append(`
                                <div class="col-lg-3 col-md-4 col-sm-6 card-adoptable ${adoptable.id}">
                                    <div class="card">
                                        <img src="{{ url('images/noImage.jpg') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">${adoptable.name}</h5>
                                            <p class="card-text">Type: ${adoptable.type}</p>
                                            <p class="card-text">Breed: ${adoptable.breed}</p>
                                            <p class="card-text">Age: ${adoptable.age}</p>
                                            <button type="button" class="btn btn-primary view" data-bs-toggle="modal" data-bs-target="#adopt-modal-1" data-id="${adoptable.id}">Adopt</button>
                                        </div>
                                        </div>
                                    </div>`);
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
                        console.log(response.animal.animal_images);
                        $('.modal1 .modal-details').text(response.animal.type + " Details");
                        $('.modal1 #name').val(response.animal.name);
                        $('.modal1 #age').val(response.animal.age);
                        $('.modal1 #breed').val(response.animal.breed);
                        $('.modal1 #gender').val(response.animal.gender);
                        $('.adopt').data('id', response.animal.id);
                        
                        if(response.animal != null){
                        $.each(response.animal.animal_images, function (key, animalImages) { 
                            $('.carousel-inner').append(`
                            <div class="carousel-item " data-bs-interval="3000">
                                <img src="storage/${ animalImages.image }" class="d-block w-75  mx-auto carousel-img" alt="...">
                            </div>
                            `);
                        });
                       }
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
                        console.log(response.animals);
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





