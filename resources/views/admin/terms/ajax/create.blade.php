<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <form class="form form-horizontal" method="POST" action="{{ route('admin.manage-terms.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Terms & Conditions</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
               
                    <div class="col-sm-12">
                        <label class="label-control label">Title <span class="required">*</span></label>
                        <input type="text" class="form-control" name="title" required>
                    </div>

                            <div class="col-sm-12">

                        <label class="label-control label">Content <span class="required">*</span></label>

                        <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>

                        <div class="text-danger" id="content-err"></div>

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
<script>
    CKEDITOR.replace('content', {});
</script>