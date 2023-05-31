
<section class="slider-section mb-5">

  <div class="slider-container">
    
    @php
    $getBanner=App\Models\Banner::with('user')->where('status','active')->get();
    @endphp
  
   @foreach($getBanner as $getData)
    <div class="slide container" dir="rtl">
      <div class="slide-details">
        <div class="slide-image">
          <!-- <img src="../assets/img/slide-1.png" alt="Slider One" /> -->
          <img src="{{ URL::asset('storage/banners/' . $getData->image) }}" alt="Slider One" />
        </div>
        <div class="slide-content">
          <div class="auth-date">
            <a href="javascript:;" class="auth">
              <i class="fa-solid fa-user"></i>
              {{$getData->user->name}}
            </a>
            <a href="javascript:;" class="auth">
              <i class="fa-solid fa-calendar me-2"></i>
              {{ Carbon\Carbon::parse($getData->created_at)->format('d/m/Y') }}
              
            </a>
          </div>
          <div class="post-short-info urdu w-100">
              @if($getData->language_id == 1 || $getData->language_id == 2)
            <div class="post-tags" style="text-align: left">
              <a href="{{$getData->artical_url}}" class="btn btn-primary tag">{{$getData->title}}</a>
            </div>
            <div class="post-heading"  style="text-align: left">
              <a href="{{$getData->artical_url}}">
                <h2 class="fs-2">{{$getData->description}}</h2>
              </a>
            </div>
            @else
             <div class="post-tags">
              <a href="{{$getData->artical_url}}" class="btn btn-primary tag">{{$getData->title}}</a>
            </div>
            <div class="post-heading">
              <a href="{{$getData->artical_url}}">
                <h2 class="fs-2">{{$getData->description}}</h2>
              </a>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


<script>
  $(document).ready(function() {
    $('.slider-container').slick({
      infinite: true,
      arrows: false,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      centerMode: true,
      variableWidth: true
    });
  });
</script>
