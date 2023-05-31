@include('author.top-header')
<div class="main-section">
@include('author.header')
<div class="app-content content container-fluid">
<div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
<div class="breadcrumb-wrapper">
<ol class="breadcrumb bg-transparent mb-0">
<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
<li class="breadcrumb-item">videos</li>
<li class="breadcrumb-item active">Manage video</li>
</ol>
</div>

<div class="add-back ml-auto mr-2">
<a href="javascript:void(0)" class="add-video btn text-dark"><i class="fa fa-plus"></i> Add </a>
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
<th>Link</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@if (isset($videos) && count($videos) > 0)
@foreach ($videos as $video)
<tr>
<td>{{ $video->created_at }}</td>
<td>{{ $video->title }}</td>
<td>{{ $video->link }}</td>
 <td>{{ $video->status }}</td>
<td class="text-truncate">
<a href="javascript:void(0)" class="edit-video text-dark mr-2" video_id="{{ $video->id }}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a href="javascript:void(0)" onclick="deleteConfirmation({{ $video->id }})" title="Delete" class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>

</td>
</tr>
@endforeach
@endif
</tbody>

</table>
     {{$videos->links("pagination::bootstrap-4")}}
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
url: `{{ URL::to('author/manage-video/${id}') }}`,
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


$(document).on("click", ".add-video", function(event) { 
$.ajax({
url: "{{ URL::to('author/manage-video/create') }}",
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


$(document).on("click", ".add-video-btn", function(event) {
$(this).attr('disabled', true);
$('#title-err').html('');
$('#title-hindi-err').html('');
$('#title-arabic-err').html('');
$('#title-urdu-err').html('');
$('#url-err').html('');
$('#link-err').html('');
$('#image-err').html('');
$('#status-err').html('');
let formData = new FormData();
formData.append('title', $('#title').val());
formData.append('title_hindi', $('#title_hindi').val());
formData.append('title_arabic', $('#title_arabic').val());
formData.append('title_urdu', $('#title_urdu').val());
formData.append('url', $('#url').val());
formData.append('link', $('#link').val());
 formData.append('status', $('#status').val());
 formData.append('vedio_cover', (typeof $('#image')[0].files[0] == 'undefined') ? '' : $('#image')[0].files[0]);
$.ajax({
url: "{{ URL::to('author/manage-video') }}",
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

$(document).on("click", ".edit-video", function(event) {
let id = $(this).attr('video_id');

$.ajax({
url: `{{ URL::to('author/manage-video/${id}/edit') }}`,
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

$(document).on("click", "#update-video-btn", function(event) {
for (instance in CKEDITOR.instances) {
CKEDITOR.instances[instance].updateElement();
}
$(this).attr('disabled', true);
$('#title-err').html('');
$('#title-hindi-err').html('');
$('#title-arabic-err').html('');
$('#title-urdu-err').html('');
$('#url-err').html('');
$('#link-err').html('');
 
let formData = new FormData();
formData.append('_method', 'PUT');
formData.append('title', $('#title').val());
formData.append('title_hindi', $('#title_hindi').val());
formData.append('title_arabic', $('#title_arabic').val());
formData.append('title_urdu', $('#title_urdu').val());
formData.append('url', $('#url').val());
formData.append('link', $('#link').val());
formData.append('status', $('#status').val());
formData.append('vedio_cover', (typeof $('#image')[0].files[0] == 'undefined') ? '' : $('#image')[0].files[0]);
let video_id = $(this).attr('video_id');

$.ajax({
url: `{{ URL::to('author/manage-video/${video_id}') }}`,
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

