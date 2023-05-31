@extends('frontend.includes.main')
 
@section('content')

  <!-- Hero Banner -->
  <section class="hero__banner__section">
    <div class="container">
      <div class="hero__banner">
        <h3 class="font-gilroy-bold mb-3 fs-1 text-primary">Urdu Articles</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listing</li>
          </ol>
        </nav>
      </div>
    </div>
  </section>

  <!-- Featured Articles -->
  <section class="post-section py-md-5 mt-4">
    <div class="container">
      <div class="row g-5">
    
    
          
    
        <div class="col-12 col-md-6 col-lg-4">
          <div class="medium-cards-container">
            <div class="post-image">
              <a href="javascript:void(0)">
               
              <img src="{{ URL::asset('storage/profile_photo/' . $users->profile_photo) }}" alt="image">

              </a>
            </div>
            <div class="post-content arabic [ d-flex flex-column justify-content-between ]">
              <div class="post-auth-date [ d-flex ]">
                <ul class="d-flex">
                  <li>
                    <a href="javascript:;">
                      <i class="fa-solid fa-user"></i>
                      {{$users->name}}
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fa-solid fa-calendar"></i>
                      {{ Carbon\Carbon::parse($users->created_at)->format('d/m/Y') }}
                    </a>
                  </li>
                </ul>
              </div>
              <div>
                <div class="post-tags mb-md-4 mb-4">
                  <a href="javascript:;" class="btn btn-primary tag">Fiqh-o-Hadeth</a>
                </div>
                <a href="javascript:void(0)">
                  <h3 class="m-0 post-heading">
                test
                  </h3>
                </a>
              </div>
            </div>
          </div>
        </div>
 
            
      </div>
    </div>
  </section>

  <section class="post__listing__section">
    <div class="container">
      <div class="row g-5">
        @foreach ($authorlistingalls as $authorlistingall)
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
          <div class="post__listing__card">
            <div class="post__listing__card__image">
              <ul class="__tags">
                <li><a href="javascript:;" class="btn btn-sm btn-primary tag">Fiqh-o-Hadeth</a></li>
              </ul>
              <a href="javascript:;">
                <img src="{{ URL::asset('storage/articals/' . $authorlistingall->image) }}" alt="Listing Image" />
              </a>
            </div>
            <div class="post__listing__card__content urdu">
              <a href="{{ route('articals',$authorlistingall->url)}}">
                <h4 class="mb-3 fw-bold">{{$authorlistingall->title}}</h4>
              </a>
                 <p> {!!Str::words(strip_tags($authorlistingall->content, 20))!!}</p>
              <ul class="post-auth-date d-flex font-roboto mt-4">
                {{-- <li>
                  <a href="javascript:;">
                    <i class="fa-solid fa-user"></i>
                    {{$authorlistingall->user->name}}
                  </a>
                </li> --}}
                <li>
                  <a href="javascript:;">
                    <i class="fa-solid fa-calendar"></i>
                    {{ Carbon\Carbon::parse($authorlistingall->created_at)->format('d/m/Y') }}
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
      <div class="pagination__container w-100 d-flex justify-content-center my-5 pt-3">
        <ul class="pagination pagination-lg">

          {{$authorlistingalls->links("pagination::bootstrap-4")}}
          {{-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
        </ul>
      </div>
    </div>
  </section>

  <!-- Full Width Ad -->
  <section class="post-section">
    <div class="container">
      <div class="ad__cont vertical">
        <a href="javascript:void(0)">
          <i class="fa-solid fa-ad"></i>
          <picture>
            <!-- <source media="(max-width:650px)" srcset="img_pink_flowers.jpg')}}">
            <source media="(max-width:465px)" srcset="img_white_flower.jpg')}}"> -->
            <img src="https://www.famousmuslimastrologer.com/wp-content/themes/blankslate/images/header_inner.jpg" alt="Ad Image">
          </picture>
        </a>
      </div>
    </div>
  </section>

  <!-- Related Articles -->
  <section class="post-section py-md-5">
    <div class="container">
      <div class="section-heading [ d-flex align-items-center ]">
        <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
          <span class="white-space-nowrap">Related Articles</span>
        </h2>
        <a href="javasript:;" class="white-space-nowrap [ btn btn-light border hover-dark ]">
          View All 
          <i class="fa-solid fa-long-arrow-right"></i>
        </a>
      </div>
      <div class="row g-5">        
        <div class="col-12 col-lg-4 col-xl-3">
          <div class="ad__cont vertical">
            <a href="javascript:void(0)">
              <i class="fa-solid fa-ad"></i>
              <picture>
                <!-- <source media="(max-width:650px)" srcset="img_pink_flowers.jpg')}}">
                <source media="(max-width:465px)" srcset="img_white_flower.jpg')}}"> -->
                <img src="{{asset('frontend/assets/img/ad.jpg')}}" alt="Ad Image">
              </picture>
            </a>
          </div>
        </div>
        <div class="col-12 col-lg-8 col-xl-9">
          <div class="row g-5">
            <div class="col-12 col-lg-7">
              <div class="row g-5">
                <div class="col-12">
                  <div class="small-cards-container">
                    <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
                      <a href="javascript:void(0)">
                        <h4>मशाइखे चिश्त ने हमेशा हिन्दुस्तानी मिज़ाज की रियायत की है</h4>
                      </a>
                      <div class="post-auth-date [ d-flex ]">
                        <ul class="d-flex">
                          <li>
                            <a href="javascript:;">
                              <i class="fa-solid fa-user"></i>
                              Author Name
                            </a>
                          </li>
                          <li>
                            <a href="javascript:;">
                              <i class="fa-solid fa-calendar"></i>
                              Jan 20, 2022
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="post-image">
                      <div class="post-tags [ d-flex gap-2 ]">
                        <a href="javasript:;" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
                      </div>
                      <a href="javascript:void(0)">
                        <img src="{{asset('frontend/assets/img/slide-1.png')}}" alt="">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="small-cards-container">
                    <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
                      <a href="javascript:void(0)">
                        <h4>मशाइखे चिश्त ने हमेशा हिन्दुस्तानी मिज़ाज की रियायत की है</h4>
                      </a>
                      <div class="post-auth-date [ d-flex ]">
                        <ul class="d-flex">
                          <li>
                            <a href="javascript:;">
                              <i class="fa-solid fa-user"></i>
                              Author Name
                            </a>
                          </li>
                          <li>
                            <a href="javascript:;">
                              <i class="fa-solid fa-calendar"></i>
                              Jan 20, 2022
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="post-image">
                      <div class="post-tags [ d-flex gap-2 ]">
                        <a href="javasript:;" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
                      </div>
                      <a href="javascript:void(0)">
                        <img src="{{asset('frontend/assets/img/slide-1.png')}}" alt="">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="small-cards-container">
                    <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
                      <a href="javascript:void(0)">
                        <h4>मशाइखे चिश्त ने हमेशा हिन्दुस्तानी मिज़ाज की रियायत की है</h4>
                      </a>
                      <div class="post-auth-date [ d-flex ]">
                        <ul class="d-flex">
                          <li>
                            <a href="javascript:;">
                              <i class="fa-solid fa-user"></i>
                              Author Name
                            </a>
                          </li>
                          <li>
                            <a href="javascript:;">
                              <i class="fa-solid fa-calendar"></i>
                              Jan 20, 2022
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="post-image">
                      <div class="post-tags [ d-flex gap-2 ]">
                        <a href="javasript:;" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
                      </div>
                      <a href="javascript:void(0)">
                        <img src="{{asset('frontend/assets/img/slide-1.png')}}" alt="">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-5">
              <div class="medium-cards-container">
                <div class="post-image">
                  <a href="javascript:void(0)">
                    <img src="{{asset('frontend/assets/img/shot-by.jpg')}}" alt="Image" />
                  </a>
                </div>
                <div class="post-content hindi [ d-flex flex-column justify-content-between ]">
                  <div class="post-auth-date [ d-flex ]">
                    <ul class="d-flex">
                      <li>
                        <a href="javascript:;">
                          <i class="fa-solid fa-user"></i>
                          Author Name
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;">
                          <i class="fa-solid fa-calendar"></i>
                          Jan 20, 2022
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div>
                    <div class="post-tags mb-md-4 mb-4">
                      <a href="javascript:;" class="btn btn-primary tag">Fiqh-o-Hadeth</a>
                    </div>
                    <a href="javascript:void(0)">
                      <h3 class="m-0 post-heading">
                        न्याय के बिना समाज में अमन व शाँति कायम नहीं हो सकती । उबैदुल्लाह खान आज़मी
                      </h3>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="small-cards-container">
            <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
              <a href="javascript:void(0)">
                <h4>मशाइखे चिश्त ने हमेशा हिन्दुस्तानी मिज़ाज की रियायत की है</h4>
              </a>
              <div class="post-auth-date [ d-flex ]">
                <ul class="d-flex">
                  <li>
                    <a href="javascript:;">
                      <i class="fa-solid fa-user"></i>
                      Author Name
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fa-solid fa-calendar"></i>
                      Jan 20, 2022
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="post-image">
              <div class="post-tags [ d-flex gap-2 ]">
                <a href="javasript:;" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
              </div>
              <a href="javascript:void(0)">
                <img src="{{asset('frontend/assets/img/slide-1.png')}}" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="small-cards-container">
            <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
              <a href="javascript:void(0)">
                <h4>मशाइखे चिश्त ने हमेशा हिन्दुस्तानी मिज़ाज की रियायत की है</h4>
              </a>
              <div class="post-auth-date [ d-flex ]">
                <ul class="d-flex">
                  <li>
                    <a href="javascript:;">
                      <i class="fa-solid fa-user"></i>
                      Author Name
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fa-solid fa-calendar"></i>
                      Jan 20, 2022
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="post-image">
              <div class="post-tags [ d-flex gap-2 ]">
                <a href="javasript:;" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
              </div>
              <a href="javascript:void(0)">
                <img src="{{asset('frontend/assets/img/slide-1.png')}}" alt="">
              </a>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>

@endsection




