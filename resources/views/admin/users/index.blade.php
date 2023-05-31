@include('admin.top-header')
<div class="main-section">
    @include('admin.header')
    <div class="app-content content container-fluid">
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item">All Authors</li>
                    <li class="breadcrumb-item active">Manage Author</li>
                </ol>
            </div>

            <div class="add-back ml-auto mr-2">
                <a href="javascript:void(0)" class="add-users btn text-dark"><i class="fa fa-plus"></i> Add </a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($Users) && count($Users) > 0)
                        @foreach ($Users as $User)
                        <tr>
                            <td>{{ $User->created_at }}</td>

                            <td>{{ $User->name }}</td>
                            <td>{{ $User->email }}</td>
                            <td>{{ $User->status }}</td>
                            <td class="text-truncate">
                                <a href="javascript:void(0)" class="edit-user text-dark mr-2" user_id="{{ $User->id }}"
                                    title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="javascript:void(0)" onclick="deleteConfirmation({{ $User->id }})"
                                    title="Delete" class="text-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i></a>

                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>

                </table>
                
                <div class="float-right">
                    <!-- Pagination -->
                    {{ $Users->links('pagination::bootstrap-4') }}

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
                url: `{{ URL::to('admin/manage-authors-user/${id}') }}`,
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
    // $(document).on('keyup', "#name", function(event) {

    // let name = $(this).val();

    // let url = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');

    // $("#url").val(url);

    // })


    $(document).on("click", ".add-users", function(event) {
        $.ajax({
            url: "{{ URL::to('admin/manage-authors/create') }}",
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


    $(document).on("click", ".add-authors-btn", function(event) {
          
        $(this).attr('disabled', true);
        $('#name-err').html('');
        $('#status-err').html('');
        $('#email-err').html('');
        $('#password-err').html('');
        $('#address-err').html('');
        $('#profile_photo-err').html('');


        let formData = new FormData();
        formData.append('name', $('#name').val());
        formData.append('email', $('#email').val());
        formData.append('password', $('#password').val());
        formData.append('status', $('#status').val());
        formData.append('address', $('#address').val());
        formData.append('instagram', $('#addrinstagramess').val());
        formData.append('you_tube', $('#you_tube').val());
        formData.append('twitter', $('#twitter').val());
        formData.append('short_intro_english', $('#short_intro_english').val());
        formData.append('short_intro_urdu', $('#short_intro_urdu').val());
        formData.append('about_us', $('#about_us').val());
        formData.append('profile_photo', (typeof $('#profile_photo')[0].files[0] == 'undefined') ? '' :
            $(
                '#profile_photo')[0].files[0]);
        $.ajax({
            url: "{{ URL::to('admin/manage-authors') }}",
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

    $(document).on("click", ".edit-user", function(event) {
        
        let id = $(this).attr('user_id');


        $.ajax({
            url: `{{ URL::to('admin/manage-authors/${id}/edit') }}`,
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

    $(document).on("click", "#update-user-btn", function(event) {
        $(this).attr('disabled', true);
        $('#name-err').html('');
        $('#email-err').html('');
        $('#status-err').html('');
        $('#address-err').html('');
        $('#profile_photo-err').html('');


        let formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append('name', $('#name').val());
        formData.append('email', $('#email').val());
        formData.append('status', $('#status').val());
        formData.append('address', $('#address').val());
        formData.append('instagram', $('#instagram').val());
        formData.append('you_tube', $('#you_tube').val());
        formData.append('twitter', $('#twitter').val());
        formData.append('about_us', $('#about_us').val());
        formData.append('short_intro_english', $('#short_intro_english').val());
        formData.append('short_intro_urdu', $('#short_intro_urdu').val());
        formData.append('profile_photo', (typeof $('#profile_photo')[0].files[0] == 'undefined') ? '' : $(
            '#profile_photo')[0].files[0]);
        let user_id = $(this).attr('user_id');
        $.ajax({
            url: `{{ URL::to('admin/manage-authors/${user_id}') }}`,
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