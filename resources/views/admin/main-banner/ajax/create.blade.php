<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <form class="form form-horizontal" method="POST" action="{{ route('admin.manage-banner.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Add Banner</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                <div class="col-sm-12">
                        <label class="label-control label">Language <span class="required">*</span></label>
                        <select class="form-control" name="language_id">
                        <option selected>Select</option>
                         @foreach ($language as $languag)
                         <option value="{{$languag->id}}">{{$languag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label class="label-control label">Title <span class="required">*</span></label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="col-sm-12">
                        <label class="label-control label">Sub-title <span class="required">*</span></label>
                        <input type="text" class="form-control" name="sub_title" required>
                    </div>
                    <div class="col-sm-12">
                        <label class="label-control label">Artical Url <span class="required"></span></label>
                        <input type="text" class="form-control" name="artical_url">
                    </div>

                    <div class="col-md-12">
                    <label class="label-control label">Description <span class="required">*</span></label>
                    <textarea class="form-control" rows="4" cols="7" placeholder="Enter Description" name="description" id="description" maxlength="160"></textarea>
                    <strong class="note-span small" id="description-limit">We recommend descriptions between 50–160 characters.(0 character)</strong>
                    <div class="text-danger validation-err" id="description-err"></div>
                    </div>
                    
                    

                    <div class="col-sm-12">
                        <label class="label-control label">Image <span class="required">*</span></label>
                        <input type="file" class="form-control" name="image" required>
                    </div>

                   

                    <div class="col-sm-12">
                        <label class="label-control label">Status <span class="required">*</span></label>
                        <select class="form-control" name="status">
                            <option value="active" selected>Active</option>
                            <option value="block">Block</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
