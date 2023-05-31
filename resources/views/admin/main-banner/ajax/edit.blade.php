<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <form class="form form-horizontal" method="POST" action="{{ route('admin.manage-banner.update', $banner->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h4 class="modal-title">Edit Banner</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <div class="form-group row">
                 <div class="col-sm-12">
                        <label class="label-control label">Language <span class="required">*</span></label>
                        <select class="form-control" name="language_id">
                         
                         @foreach ($language as $languag)
                         <option value="{{$languag->id}}" @if ($banner->language_id == $languag->id) selected="selected" @endif>{{$languag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label class="label-control label">Title <span class="required">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{ $banner->title }}" required>
                    </div>
                    <div class="col-sm-12">
                        <label class="label-control label">Sub-title <span class="required">*</span></label>
                        <input type="text" class="form-control" name="sub_title" value="{{ $banner->sub_title }}" required>
                    </div>

                    <div class="col-sm-12">
                        <label class="label-control label">Artical Url <span class="required"></span></label>
                        <input type="text" class="form-control" name="artical_url" value="{{ $banner->artical_url }}">
                    </div>
                    

                    <div class="col-md-12">
                    <label class="label-control label">Description <span class="required">*</span></label>
                    <textarea class="form-control" rows="4" cols="7" placeholder="Enter Description" name="description" id="description" maxlength="160">{{$banner->description ?? null }}</textarea>
                    <strong class="note-span small" id="description-limit">We recommend descriptions between 50–160 characters.(0 character)</strong>
                    <div class="text-danger validation-err" id="description-err"></div>
                    </div>
                   
                    <div class="col-sm-12">
                        <label class="label-control label">Image <span class="required">*</span></label>
                        <input type="file" class="form-control" name="image">
                        @if($banner->image!=null)
                        <div class="m-2"><img src="{{ asset('storage/banners/'.$banner->image) }}"height="50"> </div>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <label class="label-control label">Status <span class="required">*</span></label>
                        <select class="form-control" name="status">
 
                            <option value="active" @if ($banner->status == 'active') selected="selected" @endif>Active</option>
                            <option value="block" @if ($banner->status == 'block') selected="selected" @endif>Block</option>
                        </select>
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
