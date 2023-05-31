@include('admin.top-header')

<div class="main-section">

@include('admin.header')

<div class="app-content content container-fluid">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

<div class="breadcrumb-wrapper">

<ol class="breadcrumb bg-transparent mb-0">

<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>

<li class="breadcrumb-item active">Manage Subscribe

</li>

</ol>

</div>

<div class="add-back ml-auto mr-2">
<a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go Back</a>

</div>

</div>

<div class="content-wrapper">

<div class="table-responsive">

<table class="table table-striped table-bordered" id="for_all">

<thead>

<tr>
<th>Email</th>
<th>Created At</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@if (isset($subscribe) && count($subscribe) > 0)

@foreach ($subscribe as $subscrib)

<tr>
 

<td>{{ $subscrib->email }}</td>
 
<td>{{ $subscrib->created_at }}</td>
<td class="text-truncate">
<a href="javascript:void(0)" onclick="deleteConfirmation({{ $subscrib->id }})" class="text-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true" ></i></a>
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

url: `{{ URL::to('/admin/manage-subscribe/${id}') }}`,

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
</script>

