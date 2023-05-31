@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">

                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>

                    <li class="breadcrumb-item">Pages</li>

                    <li class="breadcrumb-item active">Profile Setting</li>

                </ol>

            </div>


        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="content-wrapper">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Account Setting</a>
                </li>
                <!--  <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Contact Details</a>
    </li> -->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Contact Details</a>
                </li>
            </ul><!-- Tab panes -->


            <div class="tab-content border px-3 ">

                <div class="tab-pane active" id="tabs-1" role="tabpanel">

                    <form class="py-5" action="{{ route('admin.changepasswordadmin') }}" method="post">
                        @csrf




                        <div class="row">
                            <div class="col-md-4">
                                <div class="wdinput form-group">


                                    <label for="oldPasswordInput" class="form-label">Old Password</label>
                                    <input name="old_password" type="password"
                                        class="form-control @error('old_password') is-invalid @enderror"
                                        id="oldPasswordInput" placeholder="Old Password">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="wdinput form-group">
                                    <label for="newPasswordInput" class="form-label">New Password</label>
                                    <input name="new_password" type="password"
                                        class="form-control @error('new_password') is-invalid @enderror"
                                        id="newPasswordInput" placeholder="New Password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="wdinput form-group">
                                    <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                    <input name="new_password_confirmation" type="password" class="form-control"
                                        id="confirmNewPasswordInput" placeholder="Confirm New Password">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="wdinput form-group">
                                    <button class="btn bg-dark text-white" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="tabs-3" role="tabpanel">
                    <form class="py-5" method="post" action="" enctype="multipart/form-data">
                        @csrf

                        @if (Session::has('success'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="wdinput form-group">
                                    <label>Email Id</label>
                                    <input type="email" class="form-control" placeholder="Enter Email Id"
                                        name="email" id="email" value="{{ $user->email ?? null }}" required>
                                </div>
                                <div class="text-danger " id="email-err"></div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="wdinput form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone Number"
                                        name="mobile_number" id="mobile_number"
                                        value="{{ $user->mobile_number ?? null }}" required>
                                </div>
                                <div class="text-danger " id="mobile_number-err"></div>
                            </div>
                             <div class="col-md-12">
                                    <div class="wdinput form-group">
                                        <label class="label-control label">About Us <span
                                                class="required">*</span></label>
                                        <textarea class="form-control" name="about_us" id="content" cols="100" rows="10">{{ $user->about_us }}</textarea>
                                        <div class="text-danger" id="content-err"></div>
                                    </div>
                                </div>


                            <div class="col-md-12">
                                <div class="wdinput form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" placeholder="Address" name="address" id="address">{{ $user->address ?? null }}</textarea>
                                </div>
                                <div class="text-danger " id="address-err"></div>
                            </div>

                            <div class="col-md-12">
                                <div class="wdinput form-group">
                                    <label>Map Iframe</label>
                                    <textarea class="form-control" placeholder="Map Iframe" name="map" id="map">{{ $user->map ?? null }}</textarea>
                                </div>
                                <div class="text-danger " id="map-err"></div>
                            </div>
                            <div class="col-md-12">
                                <label class="label-control label">Profile Photo <span
                                        class="required">*</span></label>
                                <input type="file" class="form-control" name="profile_photo" id="image">
                                <div class="text-danger" id="image-err"></div>
                                @if ($user->profile_photo != null)
                                    <div class="m-2"><img
                                            src="{{ asset('storage/profile_photo/' . $user->profile_photo) }}"height="50">
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <div class="wdinput form-group">
                                    <button class="btn bg-dark text-white" type="button"
                                        id="updateadmin">Submit</button>
                                </div>
                            </div>
                        </div>
                       


                    </form>


                </div>
            </div>
        </div>


    </div>



    @include('admin.footer')






    <script>
      //  CKEDITOR.replace('content', {});
    </script>
    <script>
      $('#content').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>
    <script>
        $(document).ready(function(event) {


            $(document).on("click", "#updateadmin", function(event) {
                //for (instance in CKEDITOR.instances) {
                   // CKEDITOR.instances[instance].updateElement();
                //}

                $('#email-err').html('');
                $('#mobile_number-err').html('');
                $('#content-err').html('');
                $('#address-err').html('');
                $('#map-err').html('');
                $('#image-err').html('');

                //$('#url-err').html('');
                //  $('#meta_title-err').html('');
                // $('#meta_keyword-err').html('');
                // $('#meta_description-err').html('');
                let formData = new FormData();

                formData.append('email', $('#email').val());
                formData.append('mobile_number', $('#mobile_number').val());
                formData.append('address', $('#address').val());
                formData.append('map', $('#map').val());
                formData.append('about_us', $('#content').val());
                formData.append('profile_photo', (typeof $('#image')[0].files[0] == 'undefined') ? '' : $(
                    '#image')[0].files[0]);
                //formData.append('url', $('#url').val());
                //formData.append('meta_title', $('#meta_title').val());
                //formData.append('meta_keyword', $('#meta_keyword').val());
                //formData.append('meta_description', $('#meta_description').val());
                //formData.append('status', $('#status').val());

                $.ajax({
                    url: "{{ URL::to('admin/profile-setting') }}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    data: formData,
                    context: this,
                    success: function(result) {
                        if (result.success) {
                            Swal.fire(
                                'Updated successfully !'
                            );

                            setTimeout(function() {

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

        });
    </script>
