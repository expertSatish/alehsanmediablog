@include('admin.top-header')
<div class="main-section">
    @include('admin.header')
    <div class="app-content content container-fluid">
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item">Album</li>
                    <li class="breadcrumb-item active">Manage Album</li>
                </ol>
            </div>

            <div class="add-back ml-auto mr-2">
                <a href="javascript:void(0)" class="add-album btn text-dark"><i class="fa fa-plus"></i> Add </a>
                <a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go
                    Back</a>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="for_all">
                    <thead>
                        <tr>
                            <th>Date &amp; Time</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($album as $res)
                        <tr>
                            <td>{{ $res->created_at }}</td>
                            <td>{{ $res->title }}</td>
                            <td>
                                @if ($res->album_image!=null)
                                <img src="{{ URL::asset('storage/album_image/' . $res->album_image) }}" class="img-fluid"
                                    style="height:50px;">
                                @else
                                NA
                                @endif
                            </td>
                            <td class="text-truncate">
                                <a href="javascript:void(0)" class="edit-album text-dark mr-2"
                                    album_id="{{ $res->id }}" title="Edit Album"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></a>

                                <a href="javascript:void(0)" onclick="deleteConfirmation({{ $res->id }})"
                                    class="text-danger" title="Delete"><i class="fa fa-trash"
                                        aria-hidden="true"></i></a>
                            </td>

                        </tr>

                        @endforeach
                    </tbody>

                </table>
                <div class="float-right">
                    <!-- Pagination -->


                </div>

            </div>


            <div class="row">
            @foreach ($album as $res)
                        
                <div class="col-4">
                    <div class="card" style="height:250px;border:2px solid gray;">
                    @if ($res->album_image!=null)
                    <a href="{{url('/admin/get-all-images/'.$res->id)}}">
                                <img src="{{ URL::asset('storage/album_image/' . $res->album_image) }}" class="img-fluid"
                                    width="100%"></a>
                                @else
                                NA
                                @endif    
                    </div>
                </div>
            @endforeach    
                
            </div>

        </div>
    </div>
    <div id="offer-modal" class="modal fade" role="dialog">
    </div>
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
                url: `{{ URL::to('admin/manage-album/${id}') }}`,
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


    $(document).on("click", ".add-album", function(event) {
        $.ajax({
            url: "{{ URL::to('admin/manage-album/create') }}",
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


    $(document).on("click", ".add-album-btn", function(event) {
        $(this).attr('disabled', true);
        $('#title-err').html('');
        $('#album-err').html('');
        let formData = new FormData();
        formData.append('title', $('#title').val());
        formData.append('album_image', (typeof $('#album_image')[0].files[0] == 'undefined') ? '' : $(
            '#album_image')[0].files[0]);
        $.ajax({
            url: "{{ URL::to('admin/manage-album') }}",
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

    $(document).on("click", ".edit-album", function(event) {
        let id = $(this).attr('album_id');

        $.ajax({
            url: `{{ URL::to('admin/manage-album/${id}/edit') }}`,
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

    $(document).on("click", "#update-album-btn", function(event) {
        $(this).attr('disabled', true);
        $('#title-err').html('');
        $('#album-err').html('');

        let formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append('title', $('#title').val());
        formData.append('album_image', (typeof $('#album_image')[0].files[0] == 'undefined') ? '' : $(
            '#album_image')[0].files[0]);
        let album_id = $(this).attr('album_id');

        $.ajax({
            url: `{{ URL::to('admin/manage-album/${album_id}') }}`,
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