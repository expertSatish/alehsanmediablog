*@extends('Admin.layout')
@section('container')
<body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

<h1>BANNER LIST</h1><br>
@if (session('status'))
<h6 class="alert alert-success">{{session('status')}}</h6>

@endif
<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#bannerModal"data-bs-whatever="@mdo">Add Banner</button>
<br><br>



<div class="row">*
<div class="col-xl-12">
    <div id="success_message"></div>
<div class="card">
<div class="card-body">
<h4 class="card-title">Banner</h4>
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
        
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>TitleEnglish</th>
                    <th>TitleUrdu</th>
                    <th>TitleHindi</th>
                    <th>TitleArbic</th>
                    <th>image</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titleEnglish }}</td>
                    <td>{{ $item->titleUrdu }}</td>
                    <td>{{ $item->titleHindi }}</td>
                    <td>{{ $item->titleArbic }}</td>
                    <td>
                        <img src="{{ asset('uploads/banner/'.$item->image)}}" width="60px" height="50px" alt="Image">
                    </td>
                    <td>
                        <button type="button" value="{{$item->id}}" class="btn btn-primary Editbtn btn-sm">Edit</button>
                    
                        <button type="button" value="{{$item->id}}" class="btn btn-danger Deletebtn btn-sm">Delete</button>
                    </td>
                   

                    
                </tr>
                @endforeach
                </tbody>
                </table>
                </div>
        
                </div>
                </div>
                </div>
                <!--end col-->
                            
                 </div>



 <!-- add modal -->                                  
    <div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="addbannerModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="addbannerModal">add banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="alert alert-warning d-none" id="save_errorList"></ul>
                <form action="{{url('admin/add_banner')}}" method="post" enctype="multipart/form-data" class="submitForm">
                    @csrf
                <div class="mb-3">
                <label for="titleenglish" class="col-form-label">TitleEnglish</label>
                <input type="text" class="form-control" id="titleenglish" name="titleenglish">

                <span class="text-danger Errtitleenglish"></span>
                </div>
                <div class="mb-3">
                <label for="titleurdu" class="col-form-label">TitleUrdu</label>
                <input type="text" class="form-control" id="titleurdu" name="titleurdu">

                <span class="text-danger Errtitleurdu"></span>
                </div>
                  <div class="mb-3">
                <label for="titlehindi" class="col-form-label">TitleHindi</label>
                <input type="text" class="form-control" id="titlehindi" name="titlehindi">

                <span class="text-danger Errtitlehindi"></span>
                </div>
                 <div class="mb-3">
                <label for="titlearbic" class="col-form-label">TitleArbic</label>
                <input type="text" class="form-control" id="titlearbic" name="titlearbic">

                <span class="text-danger Errtitlearbic"></span>
                </div>
                 <div class="mb-3">
                <label for="descriptionenglish" class="col-form-label">DescriptionEnglish</label>
                <textarea  class="form-control" id="descriptionenglish" name="descriptionenglish" ></textarea>
                <span class="text-danger Errdescriptionenglish"></span>
                </div>
                 <div class="mb-3">
                <label for="descriptionurdu" class="col-form-label">DescriptionUrdu</label>
                <textarea  class="form-control" id="descriptionurdu" name="descriptionurdu" ></textarea>

                <span class="text-danger Errdescriptionurdu"></span>
                </div>
                <div class="mb-3">
                <label for="descriptionhindi" class="col-form-label">DescriptionHindi</label>
                <textarea  class="form-control" id="descriptionhindi" name="descriptionhindi" ></textarea>

                <span class="text-danger Errdescriptionurdu"></span>
                </div>
                 <div class="mb-3">
                <label for="descriptionarbic" class="col-form-label">DescriptionArbic</label>
                <textarea  class="form-control" id="descriptionarbic" name="descriptionarbic" ></textarea>

                <span class="text-danger Errdescriptionurdu"></span>
                </div>
                <div class="mb-3">
                <label for="image" class="col-form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">

                <span class="text-danger Errimage"></span>
                </div>
                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success beforeSubmit">Save</button>
                </div>
                </div>
                </form>
                </div>
            </div>
        </div> 
    </div>
     <!--end add modal -->

     <!-- edit modal --> 
     <div class="modal fade" id="editbanner" tabindex="-1" aria-labelledby="editbanner" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="editbanner">edit & update banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    

                    

                <form action="{{url('admin/update-banner')}}" method="post" enctype="multipart/form-data" class="submitForm">
                    @csrf
                    @method('PUT')
                
                    <input type="hidden" id="bann_id" name="bann_id">
                  
                <div class="mb-3">
                <label for="titleenglish" class="col-form-label">TitleEnglish</label>
                <input type="text" class="form-control" value="" id="edit_titleenglish" name="titleenglish">

                </div>
                <div class="mb-3">
                <label for="titleurdu" class="col-form-label">TitleUrdu</label>
                <input type="text" class="form-control" value="" id="edit_titleurdu" name="titleurdu">
                </div>
                <div class="mb-3">
                <label for="titlehindi" class="col-form-label">TitleHindi</label>
                <input type="text" class="form-control" value="" id="edit_titlehindi" name="titlehindi">
                </div>
                <div class="mb-3">
                <label for="titlearbic" class="col-form-label">TitleArbic</label>
                <input type="text" class="form-control" value="" id="edit_titlearbic" name="titlearbic">
                </div>

                 <div class="mb-3">
                <label for="descriptionenglish" class="col-form-label">DescriptionEnglish</label>
                <textarea  class="form-control" value="" id="edit_descriptionenglish"  name="descriptionenglish" ></textarea>
               
                </div>
                 <div class="mb-3">
                <label for="descriptionurdu" class="col-form-label">DescriptionUrdu</label>
                <textarea  class="form-control" value="" id="edit_descriptionurdu" name="descriptionurdu" ></textarea>
                </div>

                 <div class="mb-3">
                <label for="descriptionahindi" class="col-form-label">DescriptionHindi</label>
                <textarea  class="form-control" value="" id="edit_descriptionahindi" name="descriptionahindi" ></textarea>
                </div>

                 <div class="mb-3">
                <label for="descriptionarbic" class="col-form-label">DescriptionArbic</label>
                <textarea  class="form-control" value="" id="edit_descriptionarbic" name="descriptionarbic" ></textarea>
                </div>

                

                <div class="mb-3">
                <label for="image" class="col-form-label">Image</label>
                <input type="file" class="form-control" name="image">
               

                
                </div>
                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">update</button>
                </div>
                </div>
                </form>
                </div>
            </div>
        </div> 
    </div>

     <!--end edit modal -->


     <!--delete modal -->
     <div class="modal fade" id="Deletebanner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Deleting banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/delete-banner')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <p>Confirm to delete Data?</p>
                    <input type="hidden" id="deletin_bann" name="delete_banner_id">
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Yes delete</button>
                </div>
                </div>
                </form>
                </div>
            </div>
        </div> 
    </div>
    
     <!--end delete modal -->



@endsection