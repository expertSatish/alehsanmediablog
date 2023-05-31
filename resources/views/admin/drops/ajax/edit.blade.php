<div class="modal-dialog modal-lg">

    <!-- Modal content-->

    <form class="form form-horizontal">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Edit Articals </h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                

            </div>

            <div class="modal-body">


                <div class="form-group row">
                 <div class="col-sm-6">
                        <label class="label-control label">Language <span class="required">*</span></label>
                        <select class="form-control" name="language_id" id="language_id">
                         
                         @foreach ($language as $languag)
                         <option value="{{$languag->id}}" @if ($artical->language_id == $languag->id) selected="selected" @endif>{{$languag->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-6">

                        <label class="label-control label">Category * <span class="required">*</span></label>

                        <select class="form-control" name="category" id="category">

                            <option value="" >Select a Category</option>
                             @php
                            $categories = App\Models\Category::where('status',1)->get();
                            @endphp

                           @foreach($categories as $getCat)
                            @if($artical->category_id==$getCat->id)
                            <option class="form-control" value="{{$getCat->id}}" selected>{{$getCat->name}}</option>
                            @else
                            <option class="form-control" value="{{$getCat->id}}">{{$getCat->name}}</option>
                            @endif
                            @endforeach 

                        </select>

                        <div class="text-danger" id="category-err"></div>

                    </div>

                    <div class="col-sm-6">

                        <label class="label-control label">Title <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title" value="{{ $artical->title }}">

                        <div class="text-danger" id="title-err"></div>

                    </div>

                     <div class="col-sm-6">
                        <label class="label-control label">Status <span class="required">*</span></label>
                        <select class="form-control" name="status" id="status">
                        <option value="active" @if ($artical->status == 'active') selected @endif>Active</option>
                        <option value="block" @if ($artical->active == 'block') selected @endif>Block</option>
                        </select>
                        <div class="text-danger" id="status-err"></div>
                     </div>

                    
                </div>
                
                <div class="form-group row">
                <div class="col-md-6">

                        <label class="label-control label">Image <span class="required">*</span></label>

                        <input type="file" class="form-control" name="image" id="image">

                        <div class="text-danger" id="image-err"></div>

                        @if($artical->image!=null)
                        <div class="m-2"><img src="{{ asset('storage/articals/'.$artical->image) }}"height="50"> </div>
                        @endif

                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Aproved Status <span class="required">*</span></label>
                        <select class="form-control" name="aproved" id="aproved">
                        <option value="active" @if ($artical->aproved == 'active') selected @endif>Active</option>
                        <option value="block" @if ($artical->aproved == 'block') selected @endif>Block</option>
                        </select>
                        <div class="text-danger" id="aproved-err"></div>
                     </div>

                </div>
 



                



                <div class="form-group row">

                    <div class="col-sm-12">

                        <label class="label-control label">Content <span class="required">*</span></label>

                        <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $artical->content }}</textarea>

                        <div class="text-danger" id="content-err"></div>

                    </div>

                </div>

                <div class="row border m-1 p-2 bg-light">

                    <div class="col-md-12">

                        <h6 class="border-bottom pb-2">SEO Section</h6>

                    </div>

                    <div class="col-md-12 form-group">

                       
                        <label class="label-control label">URL <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Url" name="url" id="url" value="{{ $artical->url }}">

                        <div class="text-danger" id="url-err"></div>

                    </div>

                    <div class="col-md-12 form-group">

                        <label class="label-control label">Meta Title <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Meta Title" name="meta_title" id="meta_title" maxlength="60" value="{{$artical->meta_title ?? null }}">

                        <strong class="note-span small" id="meta_title-limit">We recommend title between 50–60 characters.(0 character)</strong>

                        <div class="text-danger validation-err" id="meta_title-err"></div>

                    </div>



                    <div class="col-md-12 form-group">

                        <label class="label-control label">Meta Keywords <span class="required">*</span></label>

                        <textarea class="form-control" rows="4" cols="7" placeholder="Enter Meta Keywords" name="meta_keyword" id="meta_keyword">{{$artical->meta_keyword ?? null }}</textarea>

                        <div class="text-danger validation-err" id="meta_keyword-err"></div>

                    </div>



                    <div class="col-md-12 form-group">

                        <label class="label-control label">Meta Description <span class="required">*</span></label>

                        <textarea class="form-control" rows="4" cols="7" placeholder="Enter Meta Description" name="meta_description" id="meta_description" maxlength="160">{{$artical->meta_description ?? null }}</textarea>

                        <strong class="note-span small" id="meta_description-limit">We recommend descriptions between 50–160 characters.(0 character)</strong>

                        <div class="text-danger validation-err" id="meta_description-err"></div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="update-artical-btn" artical_id="{{ $artical->id }}">Submit</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>

    </form>

</div>



<script>

    CKEDITOR.replace('content', { });

</script>
