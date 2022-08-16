@extends('layouts.master')

@section('content')
    <h3 class="header">{{ $header }}</h3>

    <div>
        <div class="card card-details" style="width: 18rem;">
            <img src="/images/blank-profile.png">
            <div class="card-detail-body">
                <h5 class="card-title"><span>Name: </span> {{ $rescuer->name }}</h5>
                <h5 class="card-text"><span>Age: </span>{{ $rescuer->age }}</h5>
                <h5 class="card-text"><span>Gender: </span>{{ $rescuer->gender }}</h5>
                <h5 class="card-text rescued"><span>Rescued: </span> {{ isset($rescuer->animals) ? count($rescuer->animals) : "None"}}</h5>
            </div>
        </div>
    </div>

   @auth
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" id="modal-addAnimal" data-bs-target="#addAnimal-modal" > Add Rescued Animal </button>
    </div>
    @endauth
    <!-- Modal -->
    <div class="modal fade addAnimal" id="addAnimal-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Animal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form >
                        @csrf
                        <input type="hidden" id="rescuer_id" value="{{ $rescuer->id }}">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name: </label>
                            <input type="text" class="form-control" name="name" id="name">
                              <div class="alert alert-danger alert-name"></div>
                          </div>
                      
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Age: </label>
                            <input type="text" class="form-control" name="age" id="age">
                              <div class="alert alert-danger alert-age"></div>
                          </div>

                          <label for="recipient-name" class="col-form-label">Gender: </label>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="gender" name="gender" value="Male"> 
                            <label class="form-check-label" for="radio1">Male </label> 
                          </div>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="gender" name="gender" value="Female" >
                            <label class="form-check-label" for="radio2">Female</label>
                          </div>
                     
                            <div class="alert alert-danger alert-gender"></div>
                        
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Breed:  </label>
                            <input type="text" class="form-control" name="breed" id="breed">
                           
                            <div class="alert alert-danger alert-breed"></div>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Animal Type:</label>
                            <select class="form-select" id="type" name="type">
                              <option value="">---Select Option---</option>
                              <option>Dog</option>
                              <option>Cat</option>
                            </select>
                              <div class="alert alert-danger alert-type"></div>
                          </div> 

                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Rescue Location:  </label>
                            <input type="text" class="form-control" name="location" id="location">
                            <div class="alert alert-danger alert-location"></div>
                          </div>

                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Image Upload:  </label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                          </div>
                          
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary store-animal" >Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <h4 class="rescued-header">{{ count($rescuer->animals) == 0 ? '' : "Rescued Animals" }} </h4>
     
    <div class="row">
        @forelse($rescuer->animals as $animals)
            <div class="col-lg-3 col-md-4 col-sm-6 my-2 card-animal-{{ $animals->id }}">
                <div class="card">
                    <img src="/images/noImage.jpg">    
                    <div class="card-body" >
                        <h5 class="card-title">{{ $animals->name }}</h5>
                        <p class="card-text">Age: {{ $animals->age }}</p>
                        <p class="card-text">Gender: {{ $animals->gender }}</p>
                        <p class="card-text">Breed: {{ $animals->breed }}</p>
                        <p class="card-text">Type: {{ $animals->type }}</p>
                        <p class="card-text">Rescued at: {{ $animals->location }}</p>
                        @auth
                        <button type="button" class="btn btn-danger removeAnimal" data-id="{{ $animals->id }}">Remove</button>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse


    </div>
@endsection

@section('css')
<style>


    .card-detail-body{
        height: 150px;
        padding: 20px;   
    }

    .card-details{
        margin: 20px auto;
    }

    .header{
        text-align:center;
        margin: 20px 0;
    }    

    
    .card-text{
        font-size: 15px;
        margin:10px 0;
    }

    .card-body span{
        font-weight: normal;
    }
  
    #modal-addAnimal{
        display: block;
        margin: 10px auto;
    }

    #card-details{
        margin: 20px auto;
    }

    .header{
        text-align:center;
        margin: 20px 0;
    }    

    .images h5{
        text-align:center;
    }
    
    .card-text{
        font-size: 15px;
        margin:10px 0;
    }

    .card-body{
        height: 310px;
    }
    
    .card-body span{
        font-weight: normal;
    }

    .rescued{
        margin-top: -5px;
        display:inline-block;
    }

</style>
@endsection


@section('js')
    <script>
        $(document).ready(function(){
            $('.alert').hide();
            showAnimals();
            function showAnimals (){
               
            }

            $(document).on('click','.store-animal' , function(){
                //get value from input text
                var rescuer_id = $('#rescuer_id').val();
                var name = $('#name').val();
                var age = $('#age').val();
                var gender = $('input[name="gender"]:checked').val();
                var breed = $('#breed').val();
                var type = $('#type').val();
                var location = $('#location').val();
                
                var data = {
                    'rescuer_id': rescuer_id,
                    'name': name,
                    'age': age,
                    'gender': gender,
                    'breed': breed,
                    'type' : type,
                    'location' : location,
                }
                 
                console.log(data);


                $.ajax({
                    method: "POST",
                    url: "/api/rescuer/addAnimal",
                    data: data,
                    dataType: 'json',
                    success:function(response){
                        console.log(response);

                        //sweet alert if animal has been added
                        Swal.fire({
                            icon: 'success',
                            title: 'Animal has been added!',
                        })

                        //append new animal card
                        $('.row').append('<div class="col-lg-3 col-md-4 col-sm-6 my-2 card-animal-'+response.animal.id+'">\
                                <div class="card">\
                                    <img src="/images/noImage.jpg">\
                                    <div class="card-body" >\
                                        <h5 class="card-title">'+ response.animal.name +'</h5>\
                                        <p class="card-text">Age: '+ response.animal.age +'</p>\
                                        <p class="card-text">Gender: ' + response.animal.gender + '</p>\
                                        <p class="card-text">Breed: ' + response.animal.breed + '</p>\
                                        <p class="card-text">Type: ' + response.animal.type + '</p>\
                                        <p class="card-text">Rescued at: ' + response.animal.location + '</p>\
                                        <button type="button" class="btn btn-danger removeAnimal" data-id="' + response.animal.id + '">Remove</button>\
                                    </div>\
                                </div>\
                            </div>');
                        
                        //set/clear value or text from input text
                        $('#rescuer_id').val('');
                        $('#name').val('');
                        $('#age').val('');
                        $('input[name="gender"]:checked').val('');
                        $('#breed').val('');
                        $('#type').val('');
                        $('#location').val('');

                        
                        //update rescued animal count
                        $rescued = response.rescuer.animals.length;
                        $('.rescued').html('<span>Rescued: </span>'+ $rescued +'')
                        
                    },
                    error:function(error){
                        console.log(error);
                      
                      if(error.responseJSON.errors.name != null){
                          $('.alert-name').text(error.responseJSON.errors.name).fadeIn().delay(3000).fadeOut('slow');
                      }
                      
                      if(error.responseJSON.errors.age != null){
                          $('.alert-age').text(error.responseJSON.errors.age).fadeIn().delay(3000).fadeOut('slow');
                      }
                      
                      if(error.responseJSON.errors.gender != null){
                          $('.alert-gender').text(error.responseJSON.errors.gender).fadeIn().delay(3000).fadeOut('slow');
                      }
                      
                      if(error.responseJSON.erbreed != null){
                          $('.alert-breed').text(error.responseJSON.errors.breed).fadeIn().delay(3000).fadeOut('slow');
                      }

                      if(error.responseJSON.errors.location != null){
                          $('.alert-location').text(error.responseJSON.errors.location).fadeIn().delay(3000).fadeOut('slow');
                      }

                      if(error.responseJSON.errors.type != null){
                          $('.alert-type').text(error.responseJSON.errors.type).fadeIn().delay(3000).fadeOut('slow');
                      }
                    }
                });
                    
            });

            $(document).on('click','.removeAnimal', function(){
              var animal_id = $(this).data('id');
              var rescuer_id = $('#rescuer_id').val();
              var data = {
                'animal_id' : animal_id,
                'rescuer_id' : rescuer_id
              }
              console.log(animal_id);

              //sweet alert delete animal
              Swal.fire({
                    title: 'Do you want to delete animal?',
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    denyButtonText: `Don't save`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                    method: "DELETE",
                    url: "/api/rescuer/deleteAnimal",
                    data: data,
                    dataType: "json",
                    success:function(response){
                        console.log('response')

                        //update rescued animal count
                        $rescued = response.rescuer.animals.length;
                        $('.rescued').html('<span>Rescued: </span>'+ $rescued +'')
                        $('.card-animal-'+animal_id).remove();
                        
                        console.log(response);
                    }, 
                    error:function(error){
                    console.log(error);
                    }
                        
                    });
                        Swal.fire('Animal has been deleted!', '', 'success')
                    } 
                })

            
            
            });



        });
    </script>
@endsection