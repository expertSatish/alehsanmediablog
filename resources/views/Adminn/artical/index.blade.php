@extends('Admin.layout')
@section('container')


<body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <a class="btn btn-success" style="float: right;" href="{{url('admin/newartical')}}"> Add Artical</a>

<h3>Artical LIST</h3><br>
@if (session('status'))
<h6 class="alert alert-success">{{session('status')}}</h6>

@endif



 



<div class="row">
<div class="col-xl-12">
<div id="success_message"></div>
<div class="card">
<div class="card-body">
<h4 class="card-title">Artical</h4>
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
        
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Category</th>
                    <th>English</th>
                    <th>Hindi</th>
                    <th>Urdu</th>
                    <th>Arbic</th>
                    <th>Image</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($articals as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title_cat }}</td>
                    <td>{{ $item->title_eng }}</td>
                    <td>{{ $item->title_hin }}</td>
                    <td>{{ $item->title_urd }}</td>
                    <td>{{ $item->title_arb }}</td>
                    <td>
                        <img src="{{ asset('uploads/banner/'.$item->image)}}" width="60px" height="50px" alt="Image">
                    </td>
                    <td>
                        <a href="{{url('admin/newartical')}}/{{$item->id}}" class="btn btn-success Editbtnbtn">Edit</a>
                        <a href="{{url('admin/delete-article')}}/{{$item->id}}" class="btn btn-danger Deletebtnbtn">Delete</a>
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

   


@endsection