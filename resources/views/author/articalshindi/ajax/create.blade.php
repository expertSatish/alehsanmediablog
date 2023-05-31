<div class="modal-dialog modal-lg">

    <!-- Modal content-->

    <form class="form form-horizontal">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">ऐड आर्टिकल्स </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group row">
                    {{-- <div class="col-sm-6">
                        <label class="label-control label">केटेगरी<span class="required">*</span></label>
                        <select class="form-control" name="category" id="category">
                            @php
                                $categories = App\Models\Category::where('status', 1)->get();
                            @endphp
                            <option value="">सेलेक्ट केटेगरी </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger" id="category-err"></div>
                    </div> --}}

                    
                <div class="col-sm-6">
                        <label class="label-control label">केटेगरी <span class="required">*</span></label>
                        <select class="form-control" name="category" id="category">
                          @foreach ($categoriesd as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger" id="category-err"></div>
                </div>
                
                <div class="col-sm-6">
                   <label class="label-control label">Sub केटेगरी(optional) <span class="required"></span></label>
                    <select name="subcategory" id="subcategory" class="form-control input-sm">
                        <option value=""></option>
                    </select>
                </div>
                </div>

                  <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label-control label">टाइटल<span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="एंटर टाइटल" name="title"
                            id="title">

                        <div class="text-danger" id="title-err"></div>

                    </div>
                  
                    <div class="col-md-6">
                        <label class="label-control label">इमेज <span class="required">*</span></label>
                        <input type="file" class="form-control" name="image" id="image">

                        <div class="text-danger" id="image-err"></div>

                    </div>

                </div>

                <div class="form-group row">




                    <div class="col-sm-6">

                        <label class="label-control label">स्टेटस <span class="required">*</span></label>

                        <select class="form-control" name="status" id="status">

                            <option value="active">एक्टिव </option>

                            <option value="block">ब्लॉक </option>

                        </select>

                        <div class="text-danger" id="status-err"></div>

                    </div>
                </div>








                <div class="form-group row">

                    <div class="col-sm-12">

                        <label class="label-control label">कंटेंट <span class="required">*</span></label>

                        <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>

                        <div class="text-danger" id="content-err"></div>

                    </div>

                </div>

                <div class="row border m-1 p-2 bg-light">

                    <div class="col-md-12">

                        <h6 class="border-bottom pb-2">SEO सेक्शन</h6>

                    </div>

                    <div class="col-md-12 form-group">

                        <label class="label-control label">यूआरएल <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="एंटर यूआरएल  " name="url"
                            id="url">

                        <div class="text-danger" id="url-err"></div>

                    </div>

                    <div class="col-md-12 form-group">

                        <label class="label-control label">मेटा टाइटल <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="एंटर मेटा  टाइटल" name="meta_title"
                            id="meta_title" maxlength="60">

                        <strong class="note-span small" id="meta_title-limit">हम 50-60 के बीच शीर्षक की अनुशंसा करते हैं
                            वर्ण। (0 वर्ण)</strong>

                        <div class="text-danger validation-err" id="meta_title-err"></div>

                    </div>



                    <div class="col-md-12 form-group">

                        <label class="label-control label">मेटा कीवर्ड्स <span class="required">*</span></label>

                        <textarea class="form-control" rows="4" cols="7" placeholder="एंटर मेटा  कीवर्ड्स " name="meta_keyword"
                            id="meta_keyword"></textarea>

                        <div class="text-danger validation-err" id="meta_keyword-err"></div>

                    </div>



                    <div class="col-md-12 form-group">

                        <label class="label-control label">मेटा डिस्क्रिप्शन <span class="required">*</span></label>

                        <textarea class="form-control" rows="4" cols="7" placeholder="एंटर मेटा डिस्क्रिप्शन"
                            name="meta_description" id="meta_description" maxlength="160"></textarea>

                        <strong class="note-span small" id="meta_description-limit">हम बीच में विवरण सुझाते हैं
                            50-160 वर्ण। (0 वर्ण)</strong>

                        <div class="text-danger validation-err" id="meta_description-err"></div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="add-artical-hindi-btn">ऐड </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">बंद</button>

            </div>

        </div>

    </form>

</div>
<script>
   $(document).ready(function () { 
            $('#category').on('change',function(e){
            console.log(e);
            var cat_id = e.target.value;
           
            $.get('/ajax-subcat?cat_id='+ cat_id,function(data){
                
                var subcat =  $('#subcategory').empty();
                $.each(data,function(create,subcatObj){
                    var option = $('<option/>', {id:create, value:subcatObj});
                    subcat.append('<option value ="'+create+'">'+subcatObj+'</option>');
                });
            });
        });
    });
</script>


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
