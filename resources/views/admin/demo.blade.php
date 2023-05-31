<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Krishna Chikan">
    <meta name="keywords" content="Krishna Chikan">
    <meta name="author" content="Webmingo">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Categories</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/bootstrap.min.css') }}">
   <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">

   <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/style.css') }}">

    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/app.min.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin/css/bootstrap-extended.min.css') }}">
    
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin/css/colors.min.css') }}">
    
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin/css/core/colors/palette-gradient.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/datatable.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/style_inner.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" /> 

 <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin/css/jquery-ui.structure.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('admin/css/jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.4/sweetalert2.min.css"
        integrity="sha512-zEmgzrofH7rifnTAgSqWXGWF8rux/+gbtEQ1OJYYW57J1eEQDjppSv7oByOdvSJfo0H39LxmCyQTLOYFOa8wig=="
        crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body>

<div class="top-header-sec py-3">
  
</div>



<!--start here body section-->

<div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">CATALOG</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">Catalog</li>
                            <li class="breadcrumb-item active">Manage Categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">MANAGE - CATEGORIES</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a href="javascript:void(0)" id="add-category" title="Add Category"><i class="fa fa-plus"></i> Add </a></li>
                            <li><a href="javascript:history.go(-1)"><i class="fa fa-backward"></i> Go Back</a></li>
                        </ul>
                    </div>
                </div>
                <section>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="for_all">
                                            <thead>
                                                <tr>
                                                    <th>Date &amp; Time</th>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>URL</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($categories) && count($categories) > 0)
                                                    @foreach ($categories as $category)
                                                        <tr>
                                                            <td>{{ $category->created_at }}</td>
                                                            <td>{{ $category->name }}</td>
                                                            <td>{{ $category->code }}</td>
                                                            <td>{{ $category->url }}</td>
                                                            <td>
                                                                @if (isset($category->image) && Storage::exists($category->image))
                                                                    <a href="javascript:void(0)" class="view-image" category_id="{{ $category->id }}">
                                                                        <img src="{{ URL::asset('storage/' . $category->image) }}" height="50" width="50">
                                                                    </a>
                                                                @else
                                                                    NA
                                                                @endif
                                                            </td>
                                                            <td>{{ $category->status }}</td>
                                                            <td class="text-truncate">
                                                                <ul class="actions">
                                                                    <li><a href="{{ route('admin.manage-category.show', $category->id) }}" title="Add Subcategory"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                                                    <li><a href="javascript:void(0)" class="edit-category" category_id="{{ $category->id }}" title="Edit Category"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                                    <li><a href="javascript:void(0)" onclick="deleteConfirmation({{ $category->id }})" title="Delete Category"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<!--end here body section-->


<div id="category-modal" class="modal fade" role="dialog">
</div>







<div id="loader" class="loading-div loader" style="display:none;">
</div>
<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright &copy; 2022 <a href="#">Madwares</a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block hidden-md-down">Hand-crafted &amp; Made with <i class="ft-heart pink"></i></span></p>
</footer>
<!-- BEGIN VENDOR JS-->


























 <script src="{{ URL::asset('admin/js/core/app-menu.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/js/core/app.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('admin/js/scripts/customizer.min.js') }}" type="text/javascript"></script>

 <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
<script src="{{ URL::asset('admin/custom/js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/custom/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script src="{{ URL::asset('admin/custom/js/header.js') }}" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ URL::asset('admin/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.4/sweetalert2.min.js" integrity="sha512-EPNolNCOFmcnNzDqK7E4Wdwo9KBt/HCP/J8bmK6uSik6YsoLU1b8XGbg5hpw2BY+IilYjf1ce5t7rCuHB60mzA==" crossorigin="anonymous"></script>
 <script src="{{ URL::asset('admin/js/datatable.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('admin/js/newCustom.js') }}" type="text/javascript"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ajaxStart(function() {
        $("#loader").modal('show');
    });
    $(document).ajaxComplete(function() {
        $("#loader").modal('hide');
    });
</script>


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
                    url: `{{ URL::to('admin/manage-category/${id}') }}`,
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
        $(document).on("click", "#add-category", function(event) {
            $.ajax({
                url: "{{ URL::to('admin/manage-category/create') }}",
                type: "GET",
                dataType: "json",
                success: function(result) {
                    if (result.success) {
                        $("#category-modal").html(result.html);
                        $("#category-modal").modal('show');
                    } else {

                    }
                }
            });
        });

        $(document).on('keyup', "#name", function(event) {
            let name = $(this).val();
            let url = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $("#url").val(url);
        })

        $(document).on("keyup", "#meta_title", function(event) {
            let title = $(this).val();
            $('#meta_title-limit').html(`We recommend title between 50–60 characters.(${title.length} character)`);
        });

        $(document).on("keyup", "#meta_description", function(event) {
            let title = $(this).val();
            $('#meta_description-limit').html(`We recommend descriptions between 50–160 characters.(${title.length} character)`);
        });

        $(document).on("click", "#add-category-btn", function(event) {
            $(this).attr('disabled', true);
            $('.validation-err').html('');
            let formData = new FormData();
            formData.append('name', $('#name').val());
            formData.append('url', $('#url').val());
            formData.append('meta_title', $('#meta_title').val());
            formData.append('meta_keyword', $('#meta_keyword').val());
            formData.append('meta_description', $('#meta_description').val());
            formData.append('status', $('#status').val());
            formData.append('image', (typeof $('#image')[0].files[0] == 'undefined') ? '' : $('#image')[0].files[0]);
            $.ajax({
                url: "{{ URL::to('admin/manage-category') }}",
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'json',
                data: formData,
                context: this,
                success: function(result) {
                    if (result.success) {
                      
                          Swal.fire(
                                'Category!',
                                'Added'
                            );

                            setTimeout(function() {
                                location.reload();
                            }, 400);
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

        $(document).on("click", ".edit-category", function(event) {
            let id = $(this).attr('category_id');
            $.ajax({
                url: `{{ URL::to('admin/manage-category/${id}/edit') }}`,
                type: "get",
                dataType: "json",
                success: function(result) {
                    if (result.success) {
                        $("#category-modal").html(result.html);
                        $("#category-modal").modal('show');
                    } else {
                        toastr.error('error encountered ' + result.msgText);
                    }
                },
                error: function(error) {
                    toastr.error('error encountered ' + error.statusText);
                }
            });
        });

        $(document).on("click", "#update-category-btn", function(event) {
            $(this).attr('disabled', true);
            $('.validation-err').html('');
            let formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append('name', $('#name').val());
            formData.append('url', $('#url').val());
            formData.append('meta_title', $('#meta_title').val());
            formData.append('meta_keyword', $('#meta_keyword').val());
            formData.append('meta_description', $('#meta_description').val());
            formData.append('status', $('#status').val());
            formData.append('image', (typeof $('#image')[0].files[0] == 'undefined') ? '' : $('#image')[0].files[0]);
            let category_id = $(this).attr('category_id');
            $.ajax({
                url: `{{ URL::to('admin/manage-category/${category_id}') }}`,
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'json',
                data: formData,
                context: this,
                success: function(result) {
                  if (result.success) {
                      
                          Swal.fire(
                                'Category!',
                                'Updated'
                            );

                            setTimeout(function() {
                                location.reload();
                            }, 400);
                    } else {
                        $(this).attr('disabled', false);
                        if (result.code == 422) {
                            for (const key in result.errors) {
                                $(`#${key}-err`).html(result.errors[key][0]);
                            }
                        } else {
                            console.log(error);
                        }
                    }
                }
            });
        });
    });
</script>
</body>

</html>
