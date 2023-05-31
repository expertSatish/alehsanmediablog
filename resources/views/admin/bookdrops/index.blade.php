@include('admin.top-header')
<div class="main-section">
    @include('admin.header')
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
                            <th>Aproved</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (isset($books) && count($books) > 0)
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->created_at }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->aproved }}</td>
                                    <td class="text-truncate">
                                    
                                        <a href="javascript:void(0)" class="text-Success"
                                            onclick="dropsConfirmation({{ $book->id }})" title="Drops">
                                            <i class="fa-solid fa-droplet" aria-hidden="true" style="font-size:30px;"></i>
                                          </a> | <a href="javascript:void(0)" class="text-danger"
                                            onclick="deleteConfirmation({{ $book->id }})" title="Delete"><i
                                                class="fa fa-trash" aria-hidden="true" style="font-size:30px;"></i></a>


                                        {{-- <a href="javascript:void(0)" class="edit-book text-dark mr-2"
                                            book_id="{{ $book->id }}" title="Edit"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></a>

                                        <a href="javascript:void(0)" onclick="deleteConfirmation({{ $book->id }})"
                                            title="Delete" class="text-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i></a> --}}

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
                <div class="float-right">

                    {{ $books->links('pagination::bootstrap-4') }}

                </div>

            </div>

        </div>
    </div>
    <div id="offer-modal" class="modal fade" role="dialog">
    </div>
</div>
@include('admin.footer')
<script>
 function dropsConfirmation(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to Drops this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, drops it!'
            }).then((result) => {
            if (result.isConfirmed) {
                
              let formData = new FormData();
                formData.append('_method', 'PUT');
                formData.append('aproved', 'active');
                $.ajax({
                    url: ` {{ URL::to('admin/manage-book-drops/${id}') }}`,
                     type: 'POST',
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        data: formData,
                        context: this,
                         success: function(result) {
                        if (result.success) {
                            Swal.fire(
                                'Drops!',
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
                    url: `{{ URL::to('admin/manage-book-drops/${id}') }}`,
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
