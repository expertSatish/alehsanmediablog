@include('admin.top-header')
<div class="main-section">
    @include('admin.header')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Articals</li>
                        <li class="breadcrumb-item active">Manage Drops
                    </li>
                </ol>
                </div>
                <div class="add-back ml-auto mr-2">
                    {{-- <a href="javascript:void(0)" class="add-artical btn text-dark"><i class="fa fa-plus"></i> Add </a> --}}
                    <a href="javascript:history.go(-1)" class="btn text-dark"><i class="fa-solid fa-rotate-left"></i> Go
                    Back</a>
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
                            <th>Aprove</th>
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
                                        {{ $categories->name ?? 'Not selected' }}
                                    </td>

                                    <td>{{ $artical->title }}</td>
                                    <td>{{ $artical->url }}</td>

                                    <td>
                                        @if ($artical->image != null)
                                            <img src="{{ URL::asset('storage/articals/' . $artical->image) }}"
                                                class="img-fluid" style="height:50px;">
                                        @else
                                            NA
                                        @endif
                                    </td>
                                    <td>{{ $artical->aproved }}</td>
                                    <td class="text-truncate">

                                        {{-- <a href="javascript:void(0)" class="edit-artical text-dark mr-2"
                                            artical_id="{{ $artical->id }}" title="Edit"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></a>
                                        <a href="{{ route('articals', $artical->url) }}" class="text-success"
                                            title="view"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}

                                        <a href="javascript:void(0)" class="text-Success"
                                            onclick="dropsConfirmation({{ $artical->id }})" title="Drops">
                                            <i class="fa-solid fa-droplet" aria-hidden="true" style="font-size:30px;"></i>
                                          </a> | <a href="javascript:void(0)" class="text-danger"
                                            onclick="deleteConfirmation({{ $artical->id }})" title="Delete"><i
                                                class="fa fa-trash" aria-hidden="true" style="font-size:30px;"></i></a>


                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div class="float-right">
                    <!-- Pagination -->
                    {{ $articals->links('pagination::bootstrap-4') }}

                </div>
            </div>


        </div>
    </div>
    <div id="artical-modal" class="modal fade" role="dialog">
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
                    url: ` {{ URL::to('admin/manage-artical-drops/${id}') }}`,
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
                    url: `{{ URL::to('admin/manage-artical-drops/${id}') }}`,
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
