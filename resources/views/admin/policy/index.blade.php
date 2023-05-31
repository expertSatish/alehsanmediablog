@include('admin.top-header')

<div class="main-section">

@include('admin.header')

<div class="app-content content container-fluid">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

<div class="breadcrumb-wrapper">

<ol class="breadcrumb bg-transparent mb-0">

<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>

<li class="breadcrumb-item active">Manage Privacy Policy

</li>

</ol>

</div>

<div class="add-back ml-auto mr-2">

{{-- <a href="javascript:void(0)" class="btn text-dark" id="add-policy"><i class="fa fa-plus"></i> Add </a> --}}

<a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go Back</a>

</div>

</div>

<div class="content-wrapper">

<div class="table-responsive">

<table class="table table-striped table-bordered" id="for_all">

<thead>

<tr>

<th>Title</th>

<th>Contents</th>

{{-- <th>Image</th>

<th>Status</th> --}}

<th>Action</th>

</tr>

</thead>

<tbody>

@if (isset($policy) && count($policy) > 0)

@foreach ($policy as $polic)

<tr>

<!-- <td>{{ $polic->created_at }}</td> -->

<td>{{ $polic->title }}</td>

<td>{{ $polic->content }}</td>

{{-- <td>

@if ($banner->image!=null)

<img src="{{ URL::asset('storage/banners/' . $banner->image) }}" class="img-fluid" style="height:50px;">

@else

NA

@endif

</td> --}}

 

<td class="text-truncate">



<a href="javascript:void(0)" class="edit-polic text-dark mr-2" polic_id="{{ $polic->id }}" title="Edit banner"><i class="fa fa-pencil" aria-hidden="true"></i></a>

<a href="javascript:void(0)" onclick="deleteConfirmation({{ $polic->id }})" class="text-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true" ></i></a>



</td>

</tr>

@endforeach

@endif

</tbody>

</table>

</div>

</div>

</div>

<div id="banner-modal" class="modal fade" role="dialog">

</div>

@include('admin.footer')

<script>

function deleteConfirmation(id) {

Swal.fire({

title: 'Are you sure?',

text: "You won't be able to revert this!",

icon: 'warning',

showCancelButton: true,

confirmButtonColor: '#3085d6',

cancelButtonColor: '#d33',

confirmButtonText: 'Yes, delete it!'

}).then((result) => {

if (result.isConfirmed) {

$.ajax({

url: `{{ URL::to('/admin/manage-terms/${id}') }}`,

type: "DELETE",

dataType: "json",

success: function(result) {

if (result.success) {

Swal.fire(

'Deleted!',

'success'

);

setTimeout(function() {

location.reload();

}, 400);

} else {

Swal.fire(result.msgText);

}

}

});



}

})

};

$(document).ready(function() {

$(document).on("click", "#add-policy", function(event) {

$.ajax({

url: "{{ URL::to('/admin/manage-policy/create') }}",

type: "GET",

dataType: "json",

success: function(result) {

if (result.success) {

$("#banner-modal").html(result.html);

$("#banner-modal").modal('show');

} else {



}

}

});

});



$(document).on("click", ".edit-polic", function(event) {

let id = $(this).attr('polic_id');

$.ajax({

url: `{{ URL::to('/admin/manage-policy/${id}/edit') }}`,

type: "get",

dataType: "json",

success: function(result) {

if (result.success) {

$("#banner-modal").html(result.html);

$("#banner-modal").modal('show');

} else {

toastr.error('error encountered ' + result.msgText);

}

},

error: function(error) {

toastr.error('error encountered ' + error.statusText);

}

});

});

});

</script>

