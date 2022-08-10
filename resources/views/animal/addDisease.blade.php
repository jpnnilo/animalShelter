    <!-- Button trigger modal -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDisease-modal" style="margin-bottom: 20px;">
        Add Animal Disease
    </button>

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
