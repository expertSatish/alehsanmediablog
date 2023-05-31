<div class="modal-dialog modal-lg">
         <form class="form form-horizontal">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Edit video</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label-control label">Title <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title" value="{{$video->title}}">
                        <div class="text-danger" id="title-err"></div>
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">title-hindi <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title Hindi" name="title_hindi" id="title_hindi" value="{{$video->title_hindi}}">
                        <div class="text-danger" id="title-hindi-err"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">title-Arabic <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title Arabic" name="title_arabic" id="title_arabic" value="{{$video->title_arabic}}">
                        <div class="text-danger" id="title-arabic-err"></div>
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">title-Urdu <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title Urdu" name="title_urdu" id="title_urdu" value="{{$video->title_urdu}}">
                        <div class="text-danger" id="title-urdu-err"></div>
                    </div>
                         <div class="col-sm-6">

                       
                        <label class="label-control label">URL <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Url" name="url" id="url" value="{{ $video->url }}">

                        <div class="text-danger" id="url-err"></div>

                    </div>
                   
                    <div class="col-sm-6">
                        <label class="label-control label">YouTube embed link <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter link" name="link" id="link" value="{{$video->link}}">
                        <div class="text-danger" id="link-err"></div>
                    </div>
                     <div class="col-md-6">

                        <label class="label-control label">Vedio Cover <span class="required">*</span></label>

                        <input type="file" class="form-control" name="vedio_cover" id="image">

                        <div class="text-danger" id="image-err"></div>

                        @if($video->vedio_cover!=null)
                        <div class="m-2"><img src="{{ asset('storage/vedio_cover/'.$video->vedio_cover) }}"height="50"> </div>
                        @endif

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
                <button type="button" class="btn btn-primary" id="update-video-btn" video_id="{{ $video->id }}">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </form>
    </div>
 