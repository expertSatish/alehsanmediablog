<div class="modal-dialog modal-lg">
    <form class="form form-horizontal">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Edit book</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label-control label">Title <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title"
                            value="{{$add->title}}">
                        <div class="text-danger" id="title-err"></div>
                    </div>

                    <div class="col-sm-6">
                        <label class="label-control label">Add  Image01 <span class="required">*</span></label>
                        <input type="file" class="form-control" name="add_image01" id="add_image01">
                        @if($add->add_image01!=null)
                        <div class="m-2"><img src="{{ asset('storage/add_image/'.$add->add_image01) }}" height="50" width="100%">
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Add  Image02 <span class="required">*</span></label>
                        <input type="file" class="form-control" name="add_image02" id="add_image02">
                        @if($add->add_image02!=null)
                        <div class="m-2"><img src="{{ asset('storage/add_image/'.$add->add_image02) }}" height="50" width="100%">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="update-add-btn"
                    add_id="{{ $add->id }}">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </form>
</div>