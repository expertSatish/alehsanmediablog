@extends('frontend.includes.main')
 
@section('content')

  <section class="breadcrumb__section py-4">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item"><a href="./">Artical</a></li>
          <li class="breadcrumb-item"><a href="./">Categories Name</a></li>
          <li class="breadcrumb-item active" aria-current="page">Post Name</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Banner and content -->
  <section class="post__content__section">
    <div class="container">
      <div class="post__video__iframe">
        <iframe src="https://www.youtube.com/embed/QpzK-UZzuF0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="post__content pt-5">
        <div class="post__content__header mb-4">
          <h1 class="fw-bold mb-4 urdu">
            شاہ صفی میموریل ٹرسٹ کے زیر اہتما م مختلف علاقوں میں ریلیف کیمپ اور امداد کا سلسلہ جاری
          </h1>
          <div class="post__info [ d-flex justify-content-between border-top border-bottom py-2 ]">
            <ul class="post__info__list">
              <li>
                <a href="javascript:;">
                  <i class="fa-solid fa-user"></i>
                  <span>Author Name</span>
                </a>
              </li>
              <li>
                <i class="fa-solid fa-calendar"></i>
                <span>Jan 20, 2021</span>
              </li>
            </ul>
            <div class="[ d-flex gap-2 ]">
              <ul class="post__info__list">
                <li>
                  <i class="fa-solid fa-eye"></i>
                  <span>230</span>
                </li>
                <li>
                  <i class="fa-solid fa-comments"></i>
                  <span>30</span>
                </li>
                <li>
                  <i class="fa-solid fa-share-from-square"></i>
                  <span>100</span>
                </li>
              </ul>
              <ul class="post__info__list __share">
                <li>
                  <i class="fa-solid fa-share-alt"></i>
                  <ul class="share__with d-none">
                    <li><i class="fa-brands fa-facebook-f"></i></li>
                    <li><i class="fa-brands fa-twitter"></i></li>
                    <li><i class="fa-brands fa-instagram"></i></li>
                    <li><i class="fa-brands fa-whatsapp"></i></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="comment__box">
        <h3>Comment Plughin</h3>
      </div>
    </div>
  </section>

  <section class="related__articals__section mb-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-12">
          <div class="section-heading [ d-flex align-items-center mb-4 ]">
            <h2 class="heading-text borderless m-0 font-gilroy-bold text-white fs-1">
              <span>
                <span class="font-gilroy-light">Related</span>
                <span class="font-gilroy-bold">Videos</span>
              </span>
            </h2>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="video__type__card video__type__card__related">
            <div class="video__type__card__image">
              <img src="{{asset('frontend/assets/img/video__1.jpg')}}" alt="Vidoe Thumbnail">
            </div>
            <div class="video__type__card__content urdu">
              <a href="javascript:;">
                <i class="fa-solid fa-play"></i>
                <h4>شاہ صفی میموریل ٹرسٹ کے زیر اہتما م مختلف علاقوں میں ریلیف کیمپ اور امداد کا سلسلہ جاری</h4>
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="video__type__card video__type__card__related">
            <div class="video__type__card__image">
              <img src="{{asset('frontend/assets/img/video__1.jpg')}}" alt="Vidoe Thumbnail">
            </div>
            <div class="video__type__card__content urdu">
              <a href="javascript:;">
                <i class="fa-solid fa-play"></i>
                <h4>شاہ صفی میموریل ٹرسٹ کے زیر اہتما م مختلف علاقوں میں ریلیف کیمپ اور امداد کا سلسلہ جاری</h4>
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="video__type__card video__type__card__related">
            <div class="video__type__card__image">
              <img src="{{asset('frontend/assets/img/video__1.jpg')}}" alt="Vidoe Thumbnail">
            </div>
            <div class="video__type__card__content urdu">
              <a href="javascript:;">
                <i class="fa-solid fa-play"></i>
                <h4>شاہ صفی میموریل ٹرسٹ کے زیر اہتما م مختلف علاقوں میں ریلیف کیمپ اور امداد کا سلسلہ جاری</h4>
              </a>
            </div>
          </div>
        </div>
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
          <span class="white-space-nowrap">Most Popular Articles</span>
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





