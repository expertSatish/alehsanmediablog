@include('admin.top-header')

<div class="main-section">
    @include('admin.header')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Gallery</li>
                        <li class="breadcrumb-item active">Manage Images
                        </li>
                    </ol>
                </div>

            </div>

            <form action="{{route('admin.manage-gallery.store')}}" class="form-image-upload" method="POST"
                enctype="multipart/form-data">


                {!! csrf_field() !!}


                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif


                <div class="row">
                    <div class="col-md-4">
                        <strong>Select Album</strong>
                        <select name="album_id" class="form-control">
                            <option value="">Select Album</option>
                            @foreach($album as $temp)
                            <option value="{{$temp->id}}">{{$temp->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <strong>Title</strong>
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="col-md-4">
                        <strong>Image</strong>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <br />
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>


            </form>


            <div class="row">
                <div class='list-group gallery'>

                    @if($images->count())
                    @foreach($images as $image)
                    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                        <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
                            <img class="img-responsive" alt="" src="/images/{{ $image->image }}" />
                            <div class='text-center'>
                                <small class='text-muted'>{{ $image->title }}</small>
                            </div> <!-- text-center / end -->
                        </a>
                        <form action="{{ route('admin.manage-gallery.destroy',$image->id) }}" method="POST">
                            <input type="hidden" name="_method" value="delete">
                            {!! csrf_field() !!}
                            <button type="submit" class="close-icon btn btn-danger"><i
                                    class="glyphicon glyphicon-remove"></i></button>
                        </form>
                    </div> <!-- col-6 / end -->
                    @endforeach
                    @endif


                </div> <!-- list-group / end -->
            </div> <!-- row / end -->
        </div> <!-- container / end -->


    </div>
</div>

</div>
@include('admin.footer')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- References: https://github.com/fancyapps/fancyBox -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
</script>