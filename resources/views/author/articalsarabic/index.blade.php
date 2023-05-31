@include('author.top-header')
<div class="main-section">
@include('author.header')
<div class="app-content content container-fluid">
<div class="content-wrapper">
<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
<div class="breadcrumb-wrapper">
<ol class="breadcrumb bg-transparent mb-0">
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item">Articles</li>
<li class="breadcrumb-item active">Manage Articles
</li>
</ol>
</div>
<div class="add-back ml-auto mr-2">
<a href="javascript:void(0)" class="add-artical-arabic btn text-dark"><i class="fa fa-plus"></i> جمع </a>
<a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go Back</a>
</div>
</div>

<div class="table-responsive">
<table class="table table-striped table-bordered" id="for_all">
<thead>
<tr>
<th>Date &amp; Time</th>
<th>Category</th>
<th>Title</th>
<th>URL</th>
<th>Image</th>
<th>Author</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@if (isset($articals) && count($articals) > 0)
@foreach ($articals as $artical)
<tr>
<td>{{ $artical->created_at }}</td>
 
<td>
@php
$categories = App\Models\Category::where('id', $artical->category_id)->first();
@endphp
{{$categories->name??'Not selected'}}

 
</td>

<td>{{ $artical->title }}</td>
<td>{{ $artical->url }}</td>
 
<td>
@if (($artical->image)!=null)
<img src="{{ URL::asset('storage/articals/' . $artical->image) }}" class="img-fluid" style="height:50px;">
@else
NA
@endif
</td>
<td>{{ $artical->author }}</td>
<td>{{ $artical->status }}</td>
<td class="text-truncate">

<a href="javascript:void(0)" class="edit-artical-arabic text-dark mr-2" artical_id="{{ $artical->id }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a href="javascript:void(0)" class="text-danger" onclick="deleteConfirmation({{ $artical->id }})" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
</td>
</tr>
@endforeach
@endif
</tbody>
</table>

<div class="float-right">
     {{$articals->links("pagination::bootstrap-4")}}
        <!-- Pagination -->
        {{-- {{ $articals->links() }} --}}
</div>
</div>


</div>
</div>
<div id="artical-modal" class="modal fade" role="dialog">
</div>
</div>
@include('author.footer')
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
url: `{{ URL::to('author/manage-artical-arabic/${id}') }}`,
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
$(document).on('keyup', "#title", function(event) {
let title = $(this).val();
let url = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
$("#url").val(url);
})

$(document).on("click", ".add-artical-arabic", function(event) {
$.ajax({
url: "{{ URL::to('author/manage-artical-arabic/create') }}",
type: "GET",
dataType: "json",
success: function(result) {
if (result.success) {
$("#artical-modal").html(result.html);
$("#artical-modal").modal('show');
} else {

}
}
});
});

$(document).on("click", "#add-artical-arabic-btn", function(event) {
//for (instance in CKEDITOR.instances) {
//CKEDITOR.instances[instance].updateElement();
//}
$(this).attr('disabled', true);
$('#title-err').html('');
$('#category-err').html('');
$('#url-err').html('');
$('#image-err').html('');
$('#content-err').html('');
$('#author-err').html('');
$('#meta_title-err').html('');
$('#meta_keyword-err').html('');
$('#meta_description-err').html('');
$('#status-err').html('');
let formData = new FormData();
formData.append('title', $('#title').val());
formData.append('category', $('#category').val());
formData.append('subcategory', $('#subcategory').val());
formData.append('url', $('#url').val());
formData.append('content', $('#content').val());
formData.append('author', $('#author').val());
formData.append('meta_title', $('#meta_title').val());
formData.append('meta_keyword', $('#meta_keyword').val());
formData.append('meta_description', $('#meta_description').val());
formData.append('status', $('#status').val());
formData.append('image', (typeof $('#image')[0].files[0] == 'undefined') ? '' : $('#image')[0].files[0]);
$.ajax({
url: "{{ URL::to('author/manage-artical-arabic') }}",
type: 'POST',
processData: false,
contentType: false,
dataType: 'json',
data: formData,
context: this,
success: function(result) {
if (result.success) {
location.reload();
} else {
$(this).attr('disabled', false);
if (result.code == 422) {
for (const key in result.errors) {
$(`#${key}-err`).html(result.errors[key][0]);
}
} else {
console.log(result);
}
}
}
});
});

$(document).on("click", ".edit-artical-arabic", function(event) {
let id = $(this).attr('artical_id');
 
$.ajax({
url: `{{ URL::to('author/manage-artical-arabic/${id}/edit') }}`,
type: "get",
dataType: "json",
success: function(result) {
if (result.success) {
$("#artical-modal").html(result.html);
$("#artical-modal").modal('show');
} else {
toastr.error('error encountered ' + result.msgText);
}
},
error: function(error) {
toastr.error('error encountered ' + error.statusText);
}
});
});

$(document).on("click", "#update-artical-arabic-btn", function(event) {
//for (instance in CKEDITOR.instances) {
//CKEDITOR.instances[instance].updateElement();
//}
$(this).attr('disabled', true);
$('#title-err').html('');
$('#category-err').html('');
$('#url-err').html('');
$('#image-err').html('');
$('#content-err').html('');
$('#author-err').html('');
$('#meta_title-err').html('');
$('#meta_keyword-err').html('');
$('#meta_description-err').html('');
$('#status-err').html('');
let formData = new FormData();
formData.append('_method', 'PUT');
formData.append('title', $('#title').val());
formData.append('category', $('#category').val());
formData.append('subcategory', $('#subcategory').val());
formData.append('url', $('#url').val());
formData.append('content', $('#content').val());
formData.append('author', $('#author').val());
formData.append('meta_title', $('#meta_title').val());
formData.append('meta_keyword', $('#meta_keyword').val());
formData.append('meta_description', $('#meta_description').val());
formData.append('status', $('#status').val());
formData.append('image', (typeof $('#image')[0].files[0] == 'undefined') ? '' : $('#image')[0].files[0]);
let artical_id = $(this).attr('artical_id');
$.ajax({
url: `{{ URL::to('author/manage-artical-arabic/${artical_id}') }}`,
type: 'POST',
processData: false,
contentType: false,
dataType: 'json',
data: formData,
context: this,
success: function(result) {
if (result.success) {
location.reload();
} else {
$(this).attr('disabled', false);
if (result.code == 422) {
for (const key in result.errors) {
$(`#${key}-err`).html(result.errors[key][0]);
}
} else {
console.log(result);
}
}
}
});
});
});


</script>
