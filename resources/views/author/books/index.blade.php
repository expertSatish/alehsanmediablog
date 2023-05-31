@include('author.top-header')
<div class="main-section">
@include('author.header')
<div class="app-content content container-fluid">
<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
<div class="breadcrumb-wrapper">
<ol class="breadcrumb bg-transparent mb-0">
<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
<li class="breadcrumb-item">books</li>
<li class="breadcrumb-item active">Manage book</li>
</ol>
</div>

<div class="add-back ml-auto mr-2">
<a href="javascript:void(0)" class="add-book btn text-dark"><i class="fa fa-plus"></i> Add </a>
<a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go Back</a>
</div>
</div>
<div class="content-wrapper">
<div class="table-responsive">
<table class="table table-striped table-bordered" id="for_all">
<thead>
<tr>
<th>Date &amp; Time</th> 
<th>Title</th>
 
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
 
@if (isset($books) && count($books) > 0)
@foreach ($books as $book)
<tr>
<td>{{ $book->created_at }}</td>
<td>{{ $book->title }}</td>
 
<td>{{ $book->status }}</td>
<td class="text-truncate">
<a href="javascript:void(0)" class="edit-book text-dark mr-2" book_id="{{ $book->id }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a href="javascript:void(0)" onclick="deleteConfirmation({{ $book->id }})" title="Delete" class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>

</td>
</tr>
@endforeach
@endif
</tbody>

</table>
 
{{$books->links("pagination::bootstrap-4")}}
</div>

</div>
</div>
<div id="offer-modal" class="modal fade" role="dialog">
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
url: `{{ URL::to('author/manage-book/${id}') }}`,
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


$(document).ready(function(event) {
$(document).on('keyup', "#title", function(event) {

let name = $(this).val();

let url = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');

$("#url").val(url);

})


$(document).on("click", ".add-book", function(event) { 
$.ajax({
url: "{{ URL::to('author/manage-book/create') }}",
type: "GET",
dataType: "json",
success: function(result) {
if (result.success) {
$("#offer-modal").html(result.html);
$("#offer-modal").modal('show');
} else {

}
}
});
});


$(document).on("click", ".add-book-btn", function(event) {
$(this).attr('disabled', true);
$('#title-err').html('');
$('#editor-err').html('');
$('#compilers-err').html('');
$('#assistants-err').html('');
$('#translator-err').html('');
$('#researchanalysis-err').html('');
$('#totalpages-err').html('');
$('#publisher-err').html('');
$('#publicationdate-err').html('');
$('#url-err').html('');
$('#image-err').html('');
$('#book_cover-err').html('');
$('#status-err').html('');
let formData = new FormData();
formData.append('title', $('#title').val());
formData.append('editor', $('#editor').val());
formData.append('compilers', $('#compilers').val());
formData.append('assistants', $('#assistants').val());
formData.append('translator', $('#translator').val());
formData.append('researchanalysis', $('#researchanalysis').val());
formData.append('totalpages', $('#totalpages').val());
formData.append('publisher', $('#publisher').val());
formData.append('publicationdate', $('#publicationdate').val());
 formData.append('status', $('#status').val());
 formData.append('url', $('#url').val());
 formData.append('pdf_url', $('#pdf_url').val());
 formData.append('book_image', (typeof $('#image')[0].files[0] == 'undefined') ? '' : $('#image')[0].files[0]);
 formData.append('book_cover', (typeof $('#book_cover')[0].files[0] == 'undefined') ? '' : $('#book_cover')[0].files[0]);
 formData.append('book_file', (typeof $('#book_file')[0].files[0] == 'undefined') ? '' : $(
                '#book_file')[0].files[0]);

$.ajax({
url: "{{ URL::to('author/manage-book') }}",
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

$(document).on("click", ".edit-book", function(event) {
let id = $(this).attr('book_id');

$.ajax({
url: `{{ URL::to('author/manage-book/${id}/edit') }}`,
type: "get",
dataType: "json",
success: function(result) {
if (result.success) {
$("#offer-modal").html(result.html);
$("#offer-modal").modal('show');
} else {
toastr.error('error encountered ' + result.msgText);
}
},
error: function(error) {
toastr.error('error encountered ' + error.statusText);
}
});
});

$(document).on("click", "#update-book-btn", function(event) {
for (instance in CKEDITOR.instances) {
CKEDITOR.instances[instance].updateElement();
}
$(this).attr('disabled', true);
$('#title-err').html('');
$('#editor-err').html('');
$('#compilers-err').html('');
$('#assistants-err').html('');
$('#translator-err').html('');
$('#researchanalysis-err').html('');
$('#totalpages-err').html('');
$('#publisher-err').html('');
$('#publicationdate-err').html('');
$('#image-err').html('');
$('#book_cover-err').html('');
$('#url-err').html('');
 
let formData = new FormData();
formData.append('_method', 'PUT');
formData.append('title', $('#title').val());
formData.append('editor', $('#editor').val());
formData.append('compilers', $('#compilers').val());
formData.append('assistants', $('#assistants').val());
formData.append('translator', $('#translator').val());
formData.append('researchanalysis', $('#researchanalysis').val());
formData.append('totalpages', $('#totalpages').val());
formData.append('publisher', $('#publisher').val());
formData.append('publicationdate', $('#publicationdate').val());
formData.append('url', $('#url').val());
formData.append('pdf_url', $('#pdf_url').val());
 
formData.append('status', $('#status').val());
 formData.append('book_image', (typeof $('#image')[0].files[0] == 'undefined') ? '' : $('#image')[0].files[0]);
 formData.append('book_cover', (typeof $('#book_cover')[0].files[0] == 'undefined') ? '' : $('#book_cover')[0].files[0]);
 formData.append('book_file', (typeof $('#book_file')[0].files[0] == 'undefined') ? '' : $(
                '#book_file')[0].files[0]);
 let book_id = $(this).attr('book_id');

$.ajax({
url: `{{ URL::to('author/manage-book/${book_id}') }}`,
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

