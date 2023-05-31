<footer>
    <div>
        <div class="footer-nav-container" id="footer">
            <div class="container">
                <div class="foter-top-menu [ d-flex align-items-center justify-content-between ]">
                    <ul class="menu [ d-flex ]">
                        <li>
                            <a href="{{ route('aboutusdd') }}">Abuot us</a>
                        </li>
                        <li>
                            <a href="{{ url('contact') }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Register as an Author</a>
                        </li>
                        <li>
                            <a href="{{ route('privacypolicydd') }}">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('termsconditionsdd') }}">Terms & Conditions</a>
                        </li>
                    </ul>
                    <ul class="social [ d-flex ]">
                        <li class="icon">
                            <a href="https://www.facebook.com/AlehsanMedia" target="_blank">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="icon">
                            <a href=" https://www.youtube.com/@AlehsanMediaOfficial" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                        <li class="icon">
                            <a href="https://www.instagram.com/alehsanmedia" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                        <li class="icon">
                            <a href="https://twitter.com/alehsanmedia" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                        <li class="icon">
                            <a href="https://t.me/AlehsanMedia" target="_blank">
                                <i class="fa-brands fa-telegram "></i>
                            </a>
                        </li>
                        <li class="icon">
                            <a href="https://goo.gl/maps/qLRnZj1KQ3Lmn7sk8" target="_blank">
                                <i class="fa fa-map-marker"></i>
                            </a>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-lg-8">
                <div class="row g-5">
                    <div class="col-12 col-lg-6">
                        <div class="footer-content">
                            <img src="{{asset('frontend/assets/img/top-logo.svg')}}" alt="Footer Logo" class="mb-4"
                                width="120" />
                            <br />
                            <p class="pe-md-5">
                                @php
                                $about = App\Models\About::where('id',1)->first();
                                @endphp
                                {!!Str::words($about->content, 30)!!}

                            </p>
                            <a href="{{ route('aboutusdd') }}" class="btn border btn-outline-light mt-3 opacity-75">Read
                                More</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="footer-subscribe-container">
                            <ul>
                                <h3 class="font-poppins fw-medium text-light my-4">Quick Links</h3>
                                <li><a style="color:white" href="https://www.jamiaarifia.com">Jamia Arifia</a></li>
                                <li><a style="color:white" href="https://www.jamiaarifia.com/about-khanqah.php">Khanqah
                                        e Arifia</a></li>
                                <li><a style="color:white" href="https://www.shahsafimemorialtrust.com"> Shah Safi
                                        Memorial Trust</a></li>
                                <li><a style="color:white" href="https://daruliftaarifia.com">Darul Ifta Arifia</a></li>
                                <li><a style="color:white" href="https://shahsafiacademy.com">Shah Safi Academy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 ps-lg-4">
                <div class="print_n_digital_container"
                    style="background-image: url({{asset('frontend/assets/img/youtube.png')}})">
                    <div class="content">

                        <a href="https://www.youtube.com/channel/UCnid5c4SmEu0hWMao79H64w" type="button"
                            class="btn btn-outline-warning">
                            Subscribe
                            <i class="fa-solid fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{asset('frontend/assets/js/custome.js')}}"></script>
{{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>



<script type="text/javascript">
var $j = jQuery.noConflict();
$j(function() {
    setTimeout(function() {
        $j('#successMessage').fadeOut('fast');
    }, 3000);
});
</script>

<script>
var $j = jQuery.noConflict();
$j(function() {
    $j('#btnClick').click(function() {
        $j('html, body').animate({
            scrollTop: $j(".footer").offset().top + $j(".footer")[0].scrollHeight
        }, 2000);
        return false;
    })
});
</script>
<script>
$j(document).on("click", ".countbtnshare", function(event) {


    $j.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')
        }
    });

    let formData = new FormData();
    formData.append('_method', 'Post');
    formData.append('artical_iddd', $j('#artical_iddd').val());

    $j.ajax({
        url: `{{ URL::to('share-link-count')}}`,
        type: 'POST',
        processData: false,
        contentType: false,
        dataType: 'json',
        data: formData,
        context: this,
        success: function(result) {
            if (result.success) {
                //location.reload();
            }
        }
    });

});
</script>
<script>
$j(document).on("click", ".countbtnsharevideo", function(event) {


    $j.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')
        }
    });

    let formData = new FormData();
    formData.append('_method', 'Post');
    formData.append('video_iddd', $j('#video_iddd').val());

    $j.ajax({
        url: `{{ URL::to('share-video-count')}}`,
        type: 'POST',
        processData: false,
        contentType: false,
        dataType: 'json',
        data: formData,
        context: this,
        success: function(result) {
            if (result.success) {
                //location.reload();
            }
        }
    });

});
</script>

<script>
$j(document).on("click", ".countbtnsharebook", function(event) {


    $j.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $j('meta[name="csrf-token"]').attr('content')
        }
    });

    let formData = new FormData();
    formData.append('_method', 'Post');
    formData.append('artical_iddd', $j('#book_iddd').val());

    $j.ajax({
        url: `{{ URL::to('share-book-count')}}`,
        type: 'POST',
        processData: false,
        contentType: false,
        dataType: 'json',
        data: formData,
        context: this,
        success: function(result) {
            if (result.success) {
                //location.reload();
            }
        }
    });

});
</script>