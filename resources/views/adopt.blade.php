
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
                            
                            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                <div class="carousel-inner" >
                                    <div class="carousel-item active" data-bs-interval="3000">
                                        <img src="{{  url('images/noImage.jpg') }}" class="d-block w-75  mx-auto carousel-img" alt="...">
                                    </div>
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