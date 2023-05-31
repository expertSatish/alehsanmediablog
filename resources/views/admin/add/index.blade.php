@include('admin.top-header')
<div class="main-section">
    @include('admin.header')
    <div class="app-content content container-fluid">
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item">Ads</li>
                    <li class="breadcrumb-item active">Manage Ads</li>
                </ol>
            </div>

            <div class="add-back ml-auto mr-2">
                <a href="javascript:void(0)" class="add-add btn text-dark"><i class="fa fa-plus"></i> Add </a>
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
                        @foreach ($add as $res)
                        <tr>
                            <td>{{ $res->created_at }}</td>
                            <td>{{ $res->title }}</td>
                            <td>
                                @if ($res->add_image!=null)
                                <img src="{{ URL::asset('storage/add_image/' . $res->add_image) }}" class="img-fluid"
                                    style="height:50px;">
                                @else
                                NA
                                @endif
                            </td>
                            <td class="text-truncate">
                                <a href="javascript:void(0)" class="edit-add text-dark mr-2"
                                    add_id="{{ $res->id }}" title="Edit Album"><i class="fa fa-pencil"
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
                url: `{{ URL::to('admin/manage-add/${id}') }}`,
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


    $(document).on("click", ".add-add", function(event) {
        $.ajax({
            url: "{{ URL::to('admin/manage-add/create') }}",
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


    $(document).on("click", ".add-add-btn", function(event) {
        $(this).attr('disabled', true);
        $('#title-err').html('');
        $('#add_image01-err1').html('');
        $('#add_image02-err2').html('');
        let formData = new FormData();
        formData.append('title', $('#title').val());
        formData.append('add_image01', (typeof $('#add_image01')[0].files[0] == 'undefined') ? '' : $(
            '#add_image01')[0].files[0]);
        formData.append('add_image02', (typeof $('#add_image02')[0].files[0] == 'undefined') ? '' : $(
            '#add_image02')[0].files[0]);
        $.ajax({
            url: "{{ URL::to('admin/manage-add') }}",
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

    $(document).on("click", ".edit-add", function(event) {
        let id = $(this).attr('add_id');

        $.ajax({
            url: `{{ URL::to('admin/manage-add/${id}/edit') }}`,
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

    $(document).on("click", "#update-add-btn", function(event) {
        $(this).attr('disabled', true);
        $('#title-err').html('');
        let formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append('title', $('#title').val());
        formData.append('add_image01', (typeof $('#add_image01')[0].files[0] == 'undefined') ? '' : $(
            '#add_image01')[0].files[0]);
        formData.append('add_image02', (typeof $('#add_image02')[0].files[0] == 'undefined') ? '' : $(
            '#add_image02')[0].files[0]);
        let add_id = $(this).attr('add_id');

        $.ajax({
            url: `{{ URL::to('admin/manage-add/${add_id}') }}`,
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