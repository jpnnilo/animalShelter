@extends('layouts.master')

@section('content')
    <input type="hidden" id="animal_id" value="{{ $animal->id }}">
    <h3>{{ $header }}</h3>

    <div style="margin-bottom: 40px;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                Name:<h5 class="card-title"> {{ $animal->name }}</h5>
                Age: <h5 class="card-text"> {{ $animal->age }}</h5>
                Gender:<h5 class="card-text">{{ $animal->gender }}</h5>
                Adopted by:<h5 class="card-text">{{ $animal->adopter->name }}</h5>
                Health Status:
                @if ($animal->diseases->isEmpty())
                    <h5 class="card-text">Healthy</h5>
                @else
                    <h5 class="card-text">Sick</h5>
                @endif
            </div>
        </div>
    </div>

    {{-- add animal photo besides --}}

  

    <h4 style="margin-bottom: 20px;">Animal Diseases</h4>


    @include('animal.addDisease')

    {{-- animal diseases --}}
    <div class="row" id="disease-card">

    </div>
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
                var animal_id = $("#animal_id").val();
                $.ajax
                ({
                    type: 'GET',
                    url: '/api/animal/disease/' + animal_id,
                    dataType: 'json',
                    success: function(response)
                    {   
                        console.log(response.animal);
                       
                        $.each(response.animal.diseases, function (key, disease) 
                        { 
                            
                            $('#disease-card').append('<div class="col-sm-3" id="card-disease'+disease.id+'">\
                                <div class="card" style="width: 18rem; margin-bottom: 20px;">\
                                    <div class="card-body">\
                                        Name: <h5 class="card-title">'+ disease.name +'</h5>\
                                        Description: <p class="card-text">'+ disease.description +'</p>\
                                        <button type="button" class="btn btn-danger removeDisease" data-id="'+ disease.id +'">Remove</button>\
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
                    url: '/api/animal/disease/' + animal_id,
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
                        $('.alert').text(err.responseJSON.message).fadeIn().delay(3000).fadeOut('slow');  //
                       
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
                    }
                });
                } else {
                    alert('Canceled!');
                }
            });
            
      
    
        });
    </script>
@endsection
