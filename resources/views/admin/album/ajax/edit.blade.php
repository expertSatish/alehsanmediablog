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
                            value="{{$album->title}}">
                        <div class="text-danger" id="title-err"></div>
                    </div>

                    <div class="col-sm-6">
                        <label class="label-control label">Album Cover Image <span class="required">*</span></label>
                        <input type="file" class="form-control" name="album_image" id="album_image">
                        <div class="text-danger" id="album-err"></div>
                        @if($album->album_image!=null)
                        <div class="m-2"><img src="{{ asset('storage/album_image/'.$album->album_image) }}" height="50">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="update-album-btn"
                    album_id="{{ $album->id }}">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </form>
</div>