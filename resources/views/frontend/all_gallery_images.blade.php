@extends('frontend.includes.main')
<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/fonts/icomoon/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/css/bootstrap-datepicker.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/fonts/flaticon/font/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/css/aos.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/css/fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/shutter/css/style.css')}}">

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'UA-23581568-13');
</script>
<script nonce="efb25235-3606-41d7-9c99-26123c99307b">
(function(w, d) {
    ! function(bv, bw, bx, by) {
        bv[bx] = bv[bx] || {};
        bv[bx].executed = [];
        bv.zaraz = {
            deferred: [],
            listeners: []
        };
        bv.zaraz.q = [];
        bv.zaraz._f = function(bz) {
            return function() {
                var bA = Array.prototype.slice.call(arguments);
                bv.zaraz.q.push({
                    m: bz,
                    a: bA
                })
            }
        };
        for (const bB of ["track", "set", "debug"]) bv.zaraz[bB] = bv.zaraz._f(bB);
        bv.zaraz.init = () => {
            var bC = bw.getElementsByTagName(by)[0],
                bD = bw.createElement(by),
                bE = bw.getElementsByTagName("title")[0];
            bE && (bv[bx].t = bw.getElementsByTagName("title")[0].text);
            bv[bx].x = Math.random();
            bv[bx].w = bv.screen.width;
            bv[bx].h = bv.screen.height;
            bv[bx].j = bv.innerHeight;
            bv[bx].e = bv.innerWidth;
            bv[bx].l = bv.location.href;
            bv[bx].r = bw.referrer;
            bv[bx].k = bv.screen.colorDepth;
            bv[bx].n = bw.characterSet;
            bv[bx].o = (new Date).getTimezoneOffset();
            if (bv.dataLayer)
                for (const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ, bK) => ({
                        ...bJ[1],
                        ...bK[1]
                    }))))) zaraz.set(bI[0], bI[1], {
                    scope: "page"
                });
            bv[bx].q = [];
            for (; bv.zaraz.q.length;) {
                const bL = bv.zaraz.q.shift();
                bv[bx].q.push(bL)
            }
            bD.defer = !0;
            for (const bM of [localStorage, sessionStorage]) Object.keys(bM || {}).filter((bO => bO.startsWith(
                "_zaraz_"))).forEach((bN => {
                try {
                    bv[bx]["z_" + bN.slice(7)] = JSON.parse(bM.getItem(bN))
                } catch {
                    bv[bx]["z_" + bN.slice(7)] = bM.getItem(bN)
                }
            }));
            bD.referrerPolicy = "origin";
            bD.src = "https://preview.colorlib.com/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON
                .stringify(bv[bx])));
            bC.parentNode.insertBefore(bD, bC)
        };
        ["complete", "interactive"].includes(bw.readyState) ? zaraz.init() : bv.addEventListener("DOMContentLoaded",
            zaraz.init)
    }(w, d, "zarazData", "script");
})(window, document);
</script>
@section('content')
<section class="post-section p-md-5">
    <div class="site-wrap">
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <main class="main-content">
            <div class="container-fluid photos">
                <div class="row pt-4 mb-5 text-center">
                    <div class="col-12">
                        <h2 class="text mb-4">'{{$album_title->title}}' &mdash; {{$count}}</h2>
                    </div>
                </div>
                <div class="row align-items-stretch">
                    @foreach($images as $res)
                    <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                        <a href="/images/{{ $res->image }}" class="d-block photo-item" data-fancybox="gallery">
                            <img src="/images/{{ $res->image }}" alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <span class="icon icon-search"></span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                  
                </div>
               
            </div>
        </main>
    </div>
</section>
<section class="post-section p-md-5">
    <div class="container">
    </div>
</section>

<section class="post-section p-md-5">
    <div class="container">
    </div>
</section>
<section class="post-section p-md-5">
    <div class="container">
    </div>
</section>
<section class="post-section p-md-5">
    <div class="container">
    </div>
</section>
<section class="post-section p-md-5">
    <div class="container">
    </div>
</section>
<section class="post-section p-md-5">
    <div class="container">
    </div>
</section>
<section class="post-section p-md-5">
    <div class="container">
    </div>
</section>
<section class="post-section p-md-5">
    <div class="container">
    </div>
</section>
<section class="post-section p-md-5">
    <div class="container">
    </div>
</section>

<script src="{{asset('frontend/assets/shutter/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/jquery-ui.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/aos.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('frontend/assets/shutter/js/main.js')}}"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vb26e4fa9e5134444860be286fd8771851679335129114"
    integrity="sha512-M3hN/6cva/SjwrOtyXeUa5IuCT0sedyfT+jK/OV+s+D0RnzrTfwjwJHhd+wYfMm9HJSrZ1IKksOdddLuN6KOzw=="
    data-cf-beacon='{"rayId":"7b3b28a69ca6f49c","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.3.0","si":100}'
    crossorigin="anonymous"></script>
@endsection