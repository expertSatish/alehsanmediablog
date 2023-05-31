<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <form class="form form-horizontal">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Add Videos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label-control label">Title<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title">
                        <div class="text-danger" id="title-err"></div>
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Title-hindi <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title Hindi" name="title_hindi" id="title_hindi">
                        <div class="text-danger" id="title-hindi-err"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Title-Arabic <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title Arabic" name="title_arabic" id="title_arabic">
                        <div class="text-danger" id="title-arabic-err"></div>
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Title-Urdu <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title Urdu" name="title_urdu" id="title_urdu">
                        <div class="text-danger" id="title-urdu-err"></div>
                    </div>
                       <div class="col-sm-6">

                        <label class="label-control label">URL <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Url" name="url"
                            id="url">

                        <div class="text-danger" id="url-err"></div>

                    </div>

                    <div class="col-sm-6">
                        <label class="label-control label">YouTube embed link<span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter link" name="link" id="link">
                        <div class="text-danger" id="link-err"></div>
                    </div>
                      <div class="col-md-6">
                      <label class="label-control label">Vedio Cover <span class="required">*</span></label>
                      <input type="file" class="form-control" name="vedio_cover" id="image">
                      <div class="text-danger" id="image-err"></div>
                      </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Status <span class="required">*</span></label>
                        <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="block">Block</option>
                        </select>
                        <div class="text-danger" id="status-err"></div>
                    </div>
                </div>



               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add-video-btn">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </form>
</div>
