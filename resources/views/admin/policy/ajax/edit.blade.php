<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <form class="form form-horizontal" method="POST" action="{{ route('admin.manage-policy.update', $policy->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h4 class="modal-title">Edit Privacy Policy</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <div class="form-group row">
                
                    <div class="col-sm-12">
                        <label class="label-control label">Title <span class="required">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{ $policy->title }}" required>
                    </div>
                    
                    <div class="col-sm-12">
                    <label class="label-control label">Content <span class="required">*</span></label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $policy->content }}</textarea>
                    <div class="text-danger" id="content-err"></div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
<script>
    //CKEDITOR.replace('content', {});
</script>

<script>
      $('#content').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>