@extends('frontend.includes.main')
 
@section('content')

 <section class="login__section mb-5">
    <div class="container [ d-flex gap-5 flex-column ]">
      <div class="login__form__container">
        <div class="left__block">
         <div class="login__form__cover" style="--cover-bg: url('https://images.unsplash.com/photo-1532012197267-da84d127e765')">
            <img src="{{asset('frontend/assets/img/top-logo.svg')}}" alt="Logo" class="logo__image" width="60px" />
          </div>
           
        </div>
        <div class="right__block">
          <form method="POST" action="{{ route('login') }}" class="login__form__block align-items-start">
            @csrf
            <div class="login__form__content w-100">
              <h1 class="font-gilroy-bold text-primary mb-2">Author Login</h1>
              <p class="fs-5">Enter your credentials to access your account.</p>
            </div>
            <div class="login__form__block__input w-100">
              <label for="email" class="form-label login__form__block__label fs-5">
                Email/Username
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-user"></i>
                <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Enter email/username">
              </div>
            </div>
            <div class="login__form__block__input w-100">
              <label for="password" class="form-label login__form__block__label fs-5">
                Password
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-lock"></i>
                <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter password">
              </div>
            </div>
            <div class="d-flex justify-content-between w-100">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember Me</label>
              </div>
              <a href="javascript:;" class="link-primary">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-lg btn-secondary d-inline-flex gap-x-2 align-items-center">
              Access My Account
              <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </button>
          </form>
        </div>
      </div>
      <div class="author__registration__info [ d-flex gap-5 align-items-center mx-auto ]">
        <div class="__icon">
          <img src="{{asset('frontend/assets/img/writting-hand.svg')}}" alt="Writting Hand Icon">
        </div>
        <div class="__content">
          <h2 class="fs-1 mb-2 font-gilroy-bold text-primary">Don't have an account?</h2>
          <p class="mb-4 fs-5">
            Become a member of Al Ehsan Media and write/post your Articles on our platform
          </p>
          <a href="./register.php" class="btn btn-primary btn-lg [ d-inline-flex align-items-center gap-3 ]">
            <i class="fa-solid fa-user-edit"></i>
            Register as an Author
          </a>
        </div>
      </div>

    </div>
  </section>

  <section class="post-section py-md-5">
  <div class="container">
    <div class="section-heading [ d-flex align-items-center ]">
      <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
        <span class="white-space-nowrap">Most Popular Articals</span>
      </h2>
      <a href="javasript:;" class="white-space-nowrap [ btn btn-light border hover-dark ]">
        View All 
        <i class="fa-solid fa-long-arrow-right"></i>
      </a>
    </div>
    <div class="row g-5">        
      <div class="col-12 col-lg-12 col-xl-3">
        <div class="ad__cont vertical">
          <a href="javascript:void(0)">
            <i class="fa-solid fa-ad"></i>
            <picture>
              <!-- <source media="(max-width:650px)" srcset="img_pink_flowers.jpg">
              <source media="(max-width:465px)" srcset="img_white_flower.jpg"> -->
              <img src="{{asset('frontend/assets/img/ad.jpg')}}" alt="Ad Image">
            </picture>
          </a>
        </div>
      </div>
      <div class="col-12 col-lg-12 col-xl-9">
        <div class="row g-5">
          <div class="col-12 col-lg-7">
            <div class="row g-5 mobile__scroll">
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
      <div class="col-12">
        <div class="row g-5 mobile__scroll">
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
    </div>
  </div>
</section>


@endsection