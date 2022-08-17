@extends('layouts.master')

@section('content')
    <input type="hidden" id="animal_id" value="{{ $animal->id }}">
    <h3 class="header">{{ $header }}</h3>


    <div class="row">
        <div class="col-lg-3">
            <div class="card " id="card-details"style="width: 18rem;">
        
                <img src=" {{ isset($image->image) ? url('storage/'. $image->image):"/images/noImage.jpg"}}">      
                
                <div class="card-body">
                    <h5 class="card-title"><span>Name:</span>  {{ $animal->name }}</h5>
                    <h5 class="card-text"><span>Age:</span>  {{ $animal->age }}</h5>
                   <h5 class="card-text"><span>Gender:</span>  {{ $animal->gender }}</h5>
                    <h5 class="card-text">
                        <span>Adopted by:</span>
                         {{ isset($animal->adopter->name) ? $animal->adopter->name : 'None' }}</h5>
                    <h5 class="card-text health-status"><span>Health Status: </span>   </h5>
                </div>
              </div>

        </div>
        <div class="col-lg-9">
           

              <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
       
                <div class="carousel-inner" >
        
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="{{  url('images/noImage.jpg') }}" class="d-block w-75  mx-auto carousel-img" alt="...">
                       
                      </div>
        
                    @forelse ($animal->animalImages as $images)
                    <div class="carousel-item " data-bs-interval="3000">
                        <img src="{{  url('storage/'. $images->image) }}" class="d-block w-75  mx-auto carousel-img" alt="...">
                       
                      </div>
                    @empty
                        
                    @endforelse
        
                 
                </div>
                <button class="carousel-control-prev carousel-button" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next carousel-button" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
    

   



    <!-- Button trigger modal -->
    @auth
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" id="modal-addDisease" data-bs-target="#addDisease-modal" > Add Disease </button>
    </div>
    @endauth
    

    <!-- Modal -->
    <div class="modal fade" id="addDisease-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Disease</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form >
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Name: </label>
                            <input type="text" class="form-control" name="name" value="{{ $animal->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Disease:</label>
                            <select class="form-select" id="disease" name="disease">
                                <option value="">---Select option---</option>
                            </select>
                                <div class="alert alert-danger"></div>
                            
                        </div>
                     
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="addDisease" class="btn btn-primary" >Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <h4 class="animalDiseases-header">Animal Diseases</h4>

    {{-- animal diseases --}}
    <div class="row" id="disease-card">

    </div>

@endsection

@section('css')
<style>

    

    .carousel-button{
        margin: auto 10%;
    }
    .carousel-inner{
        width:100%; height: 500px;
    }

    .carousel-img{
        height: 30em;
    }

    #modal-addDisease{
        display: block;
        margin: 10px auto;
    }

    #card-details{
        margin: 0px auto 20px;
    }

    .header{
        text-align:center;
        margin: 20px 0;
    }    

    .images h5{
        text-align:center;
    }
    
    .card-disease{
        margin:10px 0px;
        height: 500px;
        
        overflow: hidden;
    }

  
    .card-text{
        font-size: 15px;
        margin:10px 0;
    }

    .card-body span{
        font-weight: normal;
    }
  

    p{
       
     overflow: hidden;
    }

    

    .removeDisease{
        float:right;
    }

</style>
@endsection


@section('js')
    <script>
        $(document).ready(function() 
        {

            //show all available diseases for dropdown


            // show disease per animal
            showDiseases();
            function showDiseases() {
                $('.alert').hide();
                $('.animalDiseases-header').hide();
                
                var animal_id = $("#animal_id").val();
                $.ajax
                ({
                    type: 'GET',
                    url: '/animal/disease/' + animal_id,
                    dataType: 'json',
                    success: function(response)
                    {   
                        console.log(response.animal.diseases);
                        console.log(response);
                        if(response.animal.diseases.length == 0 ){
                            $('.health-status').html('<span> Health Status: </span> Healthy' );
                            
                        }else{
                            $('.health-status').html('<span> Health Status: </span> Sick' );
                            $('.animalDiseases-header').show();
                        }

                        $.each(response.animal.diseases, function (key, disease) 
                        {   
                            $('#disease-card').append('<div class="co   l-lg-3 col-md-4 col-sm-6" id="card-disease'+disease.id+'">\
                                <div class="card">\
                                    <div class="card-body card-disease">\
                                        '+ ( response.auth == '' ? '' : '<button type="button" class="btn btn-danger removeDisease" data-id="'+ disease.id +'">X</button>')+'\
                                         <h5 class="card-title">'+ disease.name +'</h5>\
                                        Description: <p class="card-text">'+ disease.description +'</p>\
                                        </div>\
                                    </div>\
                                </div>');
                        });

                    }
                });
            }
            
            //view diseases per animal populate to dropdown
            animalDisease();
            
            function animalDisease() {
                $('.alert').hide();
                var animal_id = $("#animal_id").val();
                $.ajax
                ({
                    type: 'GET',
                    url: '/animal/disease/' + animal_id,
                    dataType: 'json',
                    success: function(response)
                    {   
                        
                        console.log(response.animal);
                        $.each(response.disease, function(key, options){
                            $('#disease').append($('<option>',{
                                value:options.id,
                                text:options.name
                            }));
                        });
                
                    }
                });
            }
            
            // add disease per animal
            $("#addDisease").click(function (e) { 
                e.preventDefault();
                var animal_id = $("#animal_id").val();
                var disease_id = $('#disease').val();
                var data = {
                    'disease' : disease_id
                }
                $.ajax({
                    type:'POST',
                    url:'/api/animal/disease/' + animal_id,
                    data: data,
                    dataType: 'json',
                    success:function(response){ 
                        console.log(response);
                        $('#disease-card').empty();
                        $('#disease').empty();
                        showDiseases();
                        animalDisease();
                        
                    },
                    error: function(err) {
                        console.log(err);
                        console.log(err.responseJSON.message);
                        $('.alert').text(err.responseJSON.message).fadeIn().delay(3000).fadeOut('slow'); 
                       
                    }   
                });
            });

            $(document).on('click', '.removeDisease', function() {
                var disease_id = $(this).data("id"); //get the data-id value of button 
                var animal_id = $('#animal_id').val();
                console.log(animal_id);
                console.log(disease_id);
                var data = {
                    'disease_id': disease_id,
                }
                if (confirm('Remove disease?')) {
                    $.ajax({
                    type: "DELETE",
                    url: "/api/animal/disease" + animal_id,
                    data: data,
                    dataType: 'json',
                    success:function(response){
                        console.log(response);
                        $('#disease').empty();
                        animalDisease();
                        $("#card-disease"+disease_id).remove();

                        // for check if animal still has diseases
                        if(response.diseases.length == 0){
                            $('.health-status').html('<span> Health Status: </span> Healthy' );
                            $('.animalDiseases-header').html("");
                         
                        }else{
                            $('.health-status').html('<span> Health Status: </span> Sick' );
                        }
   

                    }
                });
                } else {
                    alert('Canceled!');
                }
            });
            
      
    
        });
    </script>
@endsection
