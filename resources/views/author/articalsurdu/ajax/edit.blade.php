<div class="modal-dialog modal-lg">

    <!-- Modal content-->

    <form class="form form-horizontal">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">اضافہ مضامین کی ترتیب </h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                

            </div>

            <div class="modal-body">


                <div class="form-group row">
                    {{-- <div class="col-sm-6">

                        <label class="label-control label">قسم * <span class="required">*</span></label>

                        <select class="form-control" name="category" id="category">

                            <option value="" >ایک قسم کا انتخاب کریں</option>
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

                    </div> --}}
                       <div class="col-sm-6">
                        <label class="label-control label">Category <span class="required">*</span></label>
                        <select class="form-control" name="category" id="category">
                          @foreach ($categoriesd as $categorie)
                                <option value="{{ $categorie->id }}" @if ($categorie->id == $artical->category_id) selected="selected" @endif>{{ $categorie->name }}</option>
                          @endforeach
                        </select>
                        <div class="text-danger" id="category-err"></div>
                </div>

               
               
               
                <div class="col-sm-6">
                   <label class="label-control label">Sub Category(optional) <span class="required"></span></label>
                    <select name="subcategory" id="subcategory" class="form-control input-sm">
                        <option value="{{@$subcategory->id}}">{{@$subcategory->name}}</option>
                    </select>
                </div>
                </div>

 <div class="form-group row">
                    <div class="col-sm-6">

                        <label class="label-control label">عنوان <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="عنوان کا نام" name="title" id="title" value="{{ $artical->title }}">

                        <div class="text-danger" id="title-err"></div>

                    </div>
                    
                 

                    

                    {{-- <div class="col-sm-6">

                        <label class="label-control label">Author <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="Enter Author" name="author" id="author" value="{{ $artical->author }}">

                        <div class="text-danger" id="author-err"></div>

                    </div> --}}
                    <div class="col-md-6">

                        <label class="label-control label">تصویر <span class="required">*</span></label>

                        <input type="file" class="form-control" name="image" id="image">

                        <div class="text-danger" id="image-err"></div>

                        @if($artical->image!=null)
                        <div class="m-2"><img src="{{ asset('storage/articals/'.$artical->image) }}"height="50"> </div>
                        @endif

                    </div>

                </div>

                <div class="form-group row">

                    

                    

                     <div class="col-sm-6">

                        <label class="label-control label">کیفیت <span class="required">*</span></label>

                        <select class="form-control" name="status" id="status">

                            <option value="active" @if ($artical->status == 'active') selected @endif>متعدی</option>

                            <option value="block" @if ($artical->active == 'block') selected @endif>حصہ</option>

                        </select>

                        <div class="text-danger" id="status-err"></div>

                    </div>

                </div>



                



                <div class="form-group row">

                    <div class="col-sm-12">

                        <label class="label-control label">مواد <span class="required">*</span></label>

                        <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $artical->content }}</textarea>

                        <div class="text-danger" id="content-err"></div>

                    </div>

                </div>

                <div class="row border m-1 p-2 bg-light">

                    <div class="col-md-12">

                        <h6 class="border-bottom pb-2">یس ای او کا حصہ</h6>

                    </div>

                    <div class="col-md-12 form-group">

                       
                        <label class="label-control label">یو آر ایل <span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="یو آر ایل داخل کریں" name="url" id="url" value="{{ $artical->url }}">

                        <div class="text-danger" id="url-err"></div>

                    </div>

                    <div class="col-md-12 form-group">

                        <label class="label-control label">ضمنی عنوان<span class="required">*</span></label>

                        <input type="text" class="form-control" placeholder="ضمنی عنوان داخل کریں" name="meta_title" id="meta_title" maxlength="60" value="{{$artical->meta_title ?? null }}">

                        <strong class="note-span small" id="meta_title-limit">ہم 50 سے 60 حروف پر مشتمل عنوان تجویز کرتے ہیں</strong>

                        <div class="text-danger validation-err" id="meta_title-err"></div>

                    </div>



                    <div class="col-md-12 form-group">

                        <label class="label-control label">ذیلی مطلوبہ الفاظ <span class="required">*</span></label>

                        <textarea class="form-control" rows="4" cols="7" placeholder="ذیلی مطلوبہ الفاظ لکھیں" name="meta_keyword" id="meta_keyword">{{$artical->meta_keyword ?? null }}</textarea>

                        <div class="text-danger validation-err" id="meta_keyword-err"></div>

                    </div>



                    <div class="col-md-12 form-group">

                        <label class="label-control label">ذیلی تبصرہ <span class="required">*</span></label>

                        <textarea class="form-control" rows="4" cols="7" placeholder="ذیلی تبصرہ کریں" name="meta_description" id="meta_description" maxlength="160">{{$artical->meta_description ?? null }}</textarea>

                        <strong class="note-span small" id="meta_description-limit">ہم 50 سے 160 حروف پر مشتمل تبصرہ تجویز کرتے ہیں</strong>

                        <div class="text-danger validation-err" id="meta_description-err"></div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="update-artical-urdu-btn" artical_id="{{ $artical->id }}">اضافہ</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">بند</button>
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
//CKEDITOR.replace('content', { });
</script>
<script>
      $('#content').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>
