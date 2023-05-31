<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <form class="form form-horizontal">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Add Album</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label-control label">Title<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title">
                        <div class="text-danger" id="title-err"></div>
                    </div>
                    
                       <div class="col-md-6">
                      <label class="label-control label">Album Cover Image <span class="required">*</span></label>
                      <input type="file" class="form-control" name="album_image" id="album_image">
                      <div class="text-danger" id="album-err"></div>
                      </div>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add-album-btn">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </form>
</div>
