<div class="modal-dialog modal-lg">

    <!-- Modal content-->

    <form class="form form-horizontal">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Add Blog</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                

            </div>

            <div class="modal-body">
                <div class="form-group row">

                    <div class="col-sm-6">
                        <label class="label-control label">Category <span class="required">*</span></label>
                        <select class="form-control" name="category" id="category">
                            @php
                            $categories = App\Models\BlogCategory::where('status',1)->get();
                            @endphp
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                       </select>

                        <div class="text-danger" id="category-err"></div>

                    </div>

                    <div class="col-sm-6">

                        <label class="label-control label">Title <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title">

                        <div class="text-danger" id="title-err"></div>

                    </div>

                    
                </div>

                <div class="form-group row">
                    

                    

                    <div class="col-sm-6">

                        <label class="label-control label">Author <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Author" name="author" id="author">

                        <div class="text-danger" id="author-err"></div>

                    </div>
                    <div class="col-md-6">

                        <label class="label-control label">Image <span class="required">*</span></label>

                        <input type="file" class="form-control" name="image" id="image">

                        <div class="text-danger" id="image-err"></div>

                    </div>

                </div>

                <div class="form-group row">


                    

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

                    <div class="col-sm-12">

                        <label class="label-control label">Content <span class="required">*</span></label>

                        <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>

                        <div class="text-danger" id="content-err"></div>

                    </div>

                </div>

                <div class="row border m-1 p-2 bg-light">

                    <div class="col-md-12">

                        <h6 class="border-bottom pb-2">SEO Section</h6>

                    </div>

                    <div class="col-md-12 form-group">

                         <label class="label-control label">URL <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Url" name="url" id="url">

                        <div class="text-danger" id="url-err"></div>

                    </div>

                    <div class="col-md-12 form-group">

                        <label class="label-control label">Meta Title <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Meta Title" name="meta_title" id="meta_title" maxlength="60">

                        <strong class="note-span small" id="meta_title-limit">We recommend title between 50–60 characters.(0 character)</strong>

                        <div class="text-danger validation-err" id="meta_title-err"></div>

                    </div>



                    <div class="col-md-12 form-group">

                        <label class="label-control label">Meta Keywords <span class="required">*</span></label>

                        <textarea class="form-control" rows="4" cols="7" placeholder="Enter Meta Keywords" name="meta_keyword" id="meta_keyword"></textarea>

                        <div class="text-danger validation-err" id="meta_keyword-err"></div>

                    </div>



                    <div class="col-md-12 form-group">

                        <label class="label-control label">Meta Description <span class="required">*</span></label>

                        <textarea class="form-control" rows="4" cols="7" placeholder="Enter Meta Description" name="meta_description" id="meta_description" maxlength="160"></textarea>

                        <strong class="note-span small" id="meta_description-limit">We recommend descriptions between 50–160 characters.(0 character)</strong>

                        <div class="text-danger validation-err" id="meta_description-err"></div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="add-blog-btn">Add</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>

    </form>

</div>

 

<script>

    CKEDITOR.replace('content', { });

</script>