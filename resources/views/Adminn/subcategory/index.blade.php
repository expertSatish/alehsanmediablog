@extends('Admin.layout')
@section('container')

<body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->


 
                                        
                                        
 
<h1>CATEGORY LIST</h1><br>

<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo">Add Category</button><br>
<br>
<div class="row">
<div class="col-xl-12">
    @if (session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
    @endif
<div class="card">
<div class="card-body">
<h4 class="card-title">Category</h4>
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
        
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>English</th>
                    <th>Hindi</th>
                    <th>Urdu</th>
                    <th>Arbic</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($category as $item)
                <tr>
                        <td>{{$item->id}}</td> 
                        <td>{{$item->name}}</td>
                        <td>{{$item->english}}</td>
                        <td>{{$item->hindi}}</td>
                        <td>{{$item->urdu}}</td>
                        <td>{{$item->arbic}}</td>
                     <td>
                        <button type="button" value="{{$item->id}}" class="btn btn-success editbtn btn-sm">Edit</button>
                       
                       <button type="button" value="{{$item->id}}" class="btn btn-danger deletebtn btn-sm">Delete</button>
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
                <!-- end row -->


         
                                        
      <!-- add modal -->                                  
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">add category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{url('admin/add-category')}}" method="post">
                    @csrf
                <div class="mb-3">
                <label for="name" class="col-form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                </div>

                  <div class="mb-3">
                <label for="english" class="col-form-label">English</label>
                <input type="text" class="form-control" id="english" name="english" required>
                </div>
                  <div class="mb-3">
                <label for="hindi" class="col-form-label">Hindi</label>
                <input type="text" class="form-control" id="hindi" name="hindi" required>
                </div>
                  <div class="mb-3">
                <label for="urdu" class="col-form-label">Urdu</label>
                <input type="text" class="form-control" id="urdu" name="urdu" required>
                </div>
                  <div class="mb-3">
                <label for="arbic" class="col-form-label">Arbic</label>
                <input type="text" class="form-control" id="arbic" name="arbic" required>
                </div>
                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
                </div>
                </div>
                </form>
                </div>
            </div>
        </div> 
    </div>
     <!--end add modal -->

    <!-- edit modal -->

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">edit &update category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{url('admin/update-category')}}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="text" id="category_id" name="cate_id" value="">
                <div class="mb-3">
                <label for="name" class="col-form-label">Name</label>
                <input type="text" class="form-control" id="category_name" name="name" required>
                </div>

                <div class="mb-3">
                <label for="edit_english" class="col-form-label">English</label>
                <input type="text" class="form-control" id="edit_english" name="edit_english" required>
                </div>
                
                <div class="mb-3">
                <label for="edit_hindi" class="col-form-label">Hindi</label>
                <input type="text" class="form-control" id="edit_hindi" name="edit_hindi" required>
                </div>
                
                <div class="mb-3">
                <label for="edit_urdu" class="col-form-label">Urdu</label>
                <input type="text" class="form-control" id="edit_urdu" name="edit_urdu" required>
                </div>
                
                <div class="mb-3">
                <label for="edit_arbic" class="col-form-label">Arbic</label>
                <input type="text" class="form-control" id="edit_arbic" name="edit_arbic" required>
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
<!--end edit modal-->


         
 <!--delete modal-->
         <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Deleting category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/delete-category')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <p>Confirm to delete Data?</p>
                    <input type="hidden" id="deleting_id" name="delete_category_id">
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
    <!--end delete modal-->
            


@endsection




