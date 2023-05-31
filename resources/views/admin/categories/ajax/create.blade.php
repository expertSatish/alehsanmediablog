<div class="modal-dialog modal-lg">

    <!-- Modal content-->

    <form class="form form-horizontal">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Add Categories</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>



            </div>

            <div class="modal-body">

                <div class="row">


                    <div class="col-md-12 form-group">
                        <label class="label-control label">Status <span class="required">*</span></label>
                        <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="block">Block</option>
                        </select>
                        <div class="text-danger validation-err" id="status-err"></div>
                    </div>

                    {{-- <div class="col-md-6 form-group">
                        <label class="label-control label">Selected Menu<span class="required">*</span></label>
                        <select class="form-control" name="selectedcategory" id="selected_category">
                         <option value="0">None</option>
                        
                         @foreach ($firstcategory as $firstcategor)
                        <option value="{{$firstcategor->id}}">{{$firstcategor->name}}</option>
                         @endforeach
                         
                        </select>
                        <div class="text-danger validation-err" id="selected_category-err"></div>
                    </div> --}}

                    <div class="col-md-6 form-group">
                        <label class="label-control label">Categories Name <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="name"
                            id="name">
                        <div class="text-danger validation-err" id="name-err"></div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="label-control label">Image <span class="required">*</span><strong
                                class="small text-danger">(Size 500px * 600px) </strong></label>
                        <input type="file" class="form-control" name="image" id="image">
                        <div class="text-danger validation-err" id="image-err"></div>
                    </div>


                    <div class="col-md-12 form-group">
                        <label class="label-control label">Short Description</label>
                        {{-- <input type="file" class="form-control form-group" name="shortdesc_image"
                            id="shortdesc_image"> --}}
                        {{-- <div class="text-danger" id="shortdesc_image-err"></div> --}}
                        <textarea class="form-control" cols="5" placeholder="Short Description" name="shortdesc_content"
                            id="shortdesc_content"></textarea>
                        <div class="text-danger" id="shortdesc_content-err"></div>
                    </div>


                    {{-- <div class="col-md-12 form-group">
                        <label class="label-control label">About Us</label>
                        <input type="file" class="form-control form-group" name="aboutus_image" id="aboutus_image">
                        <div class="text-danger" id="aboutus_image-err"></div>
                        <textarea class="form-control" name="aboutus_content" id="aboutus_content" cols="5"
                            placeholder="Short Description"></textarea>
                    </div> --}}
                    {{-- <div class="col-md-12 form-group">
                        <label class="label-control">Second Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="second_title"
                            id="second_title">
                    </div> --}}

                    {{-- <div class="col-md-12 form-group">
                        <label class="label-control"> Second Content </label>
                        <textarea class="form-control" name="second_content" id="second_content" cols="30" rows="10"></textarea>
                    </div> --}}
                </div>

                <div class="row border m-1 p-2 bg-light">
                    <div class="col-md-12">
                        <h6 class="border-bottom pb-2">SEO Section</h6>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="label-control label">Categories Url <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Url" name="url"
                            id="url">
                        <div class="text-danger validation-err" id="url-err"></div>
                    </div>

                    <div class="col-md-12 form-group">

                        <label class="label-control label">Meta Title <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Meta Title" name="meta_title"
                            id="meta_title" maxlength="60">

                        <strong class="note-span small" id="meta_title-limit">We recommend title between 50–60
                            characters.(0 character)</strong>

                        <div class="text-danger validation-err" id="meta_title-err"></div>

                    </div>



                    <div class="col-md-12 form-group">

                        <label class="label-control label">Meta Keywords <span class="required">*</span></label>

                        <textarea class="form-control" rows="4" cols="7" placeholder="Enter Meta Keywords" name="meta_keyword"
                            id="meta_keyword"></textarea>

                        <div class="text-danger validation-err" id="meta_keyword-err"></div>

                    </div>



                    <div class="col-md-12 form-group">

                        <label class="label-control label">Meta Description <span class="required">*</span></label>

                        <textarea class="form-control" rows="4" cols="7" placeholder="Enter Meta Description"
                            name="meta_description" id="meta_description" maxlength="160"></textarea>

                        <strong class="note-span small" id="meta_description-limit">We recommend descriptions between
                            50–160 characters.(0 character)</strong>

                        <div class="text-danger validation-err" id="meta_description-err"></div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="add-category-btn">Submit</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

    </form>

</div>

<script>
   // CKEDITOR.replace('content', {



   // });



  //CKEDITOR.replace('shortdesc_content', {});

   // CKEDITOR.replace('aboutus_content', {});

   // CKEDITOR.replace('second_content', {});
</script>


<script>
      $('#shortdesc_content').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>