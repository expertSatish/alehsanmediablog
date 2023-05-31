<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <form class="form form-horizontal">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Add Authors</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label-control label">Full Name <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name">
                        <div class="text-danger" id="name-err"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Email <span class="required">*</span></label>
                        <input type="email" class="form-control" placeholder="Enter Name" name="email" id="email">
                        <div class="text-danger" id="email-err"></div>
                    </div>
                 </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                        <label class="label-control label">Password <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="password" id="password">
                        <div class="text-danger" id="password-err"></div>
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

                <div class="form-group row">
                  <div class="col-sm-6">
                        <label class="label-control label">Profile Photo <span class="required">*</span></label>
                        <input type="file" class="form-control" name="profile_photo" id="profile_photo">
                        <div class="text-danger" id="profile_photo-err"></div>
                    </div>

                  <div class="col-sm-6">
                        <label class="label-control label">Address <span class="required">*</span></label>
                        <textarea type="text" name="address" id="address" class="form-control" placeholder="Address"></textarea>
                       
                        <div class="text-danger" id="address-err"></div>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                        <label class="label-control label">Facebook Link</label>
                        <input type="text" class="form-control" name="instagram" id="instagram">
                    </div>
                  <div class="col-sm-6">
                        <label class="label-control label">YouTube Link</label>
                        <input type="text" class="form-control" name="you_tube" id="you_tube">
                    </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6">
                        <label class="label-control label">Twitter Link</label>
                        <input type="text" class="form-control" name="twitter" id="twitter">
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Short intro English</label>
                        <textarea type="text" name="short_intro_english" id="short_intro_english" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label-control label">Short intro Urdu</label>
                        <textarea type="text" name="short_intro_urdu" id="short_intro_urdu" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12">
                        <label class="label-control label">About us</label>
                        <textarea class="form-control" name="about_us" id="about_us" cols="30" rows="10"></textarea>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add-authors-btn">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </form>
</div>


<script>
$('#about_us').summernote({
    placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    height: 100
});
</script>
