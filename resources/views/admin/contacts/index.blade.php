@include('admin.top-header')

<div class="main-section">

@include('admin.header')

<div class="app-content content container-fluid">

<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

<div class="breadcrumb-wrapper">

<ol class="breadcrumb bg-transparent mb-0">

<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>

<li class="breadcrumb-item active">Manage Contacts

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

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Message</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@if (isset($contacts) && count($contacts) > 0)

@foreach ($contacts as $contact)

<tr>
<td>{{ $contact->name }}</td>

<td>{{ $contact->email }}</td>
<td>{{ $contact->phone }}</td>
<td>{{ $contact->message }}</td>

 

 

<td class="text-truncate">
<a href="javascript:void(0)" onclick="deleteConfirmation({{ $contact->id }})" class="text-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true" ></i></a>
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

url: `{{ URL::to('/admin/manage-contact/${id}') }}`,

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

