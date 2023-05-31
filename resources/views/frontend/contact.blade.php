@extends('frontend.includes.main')

@section('content')
 <section class="login__section mb-5">
    <div class="container [ d-flex gap-5 flex-column ]">
      <div class="login__form__container">
        <div class="left__block">
          <div class="login__form__cover" style="background-image: url('{{ asset('frontend/assets/img/jamia-arifia-cover.jpg')}}');">
            <img src="{{asset('frontend/assets/img/top-logo.svg')}}" alt="Logo" class="logo__image" width="75px" />
          </div>
        </div>
        <div class="right__block">
         @if (session()->has('success'))
          <div class="alert alert-success" id="successMessage">
              {{ session()->get('success') }}
          </div>
         @endif

         {{-- @if(session()->get('success'))
        <div class="alert alert-info alert-dismissible" >
            <a href="javascript:void(0);" id="successMessage" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ session()->get('success') }}
        </div>
        @endif --}}

        @if(session()->get('error'))
        <div class="alert alert-danger alert-dismissible">
            <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> {{ session()->get('error') }}
        </div>
        @endif
          <form action="{{ route('contact_us_post') }}" class="login__form__block align-items-start gap-4" method="post">
          @csrf
            <div class="login__form__content w-100">
              <h1 class="font-gilroy-light text-dark mb-1">Love to hear from you.</h1>
              <h1 class="fs-1 font-gilroy-bold text-primary">Get in touch</h1>
            </div>
            <div class="login__form__block__input w-100">
              <label for="fullname" class="form-label login__form__block__label fs-5">
                Full Name
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-user"></i>
                <input type="text" class="form-control form-control-lg" name="fullname" id="fullname" placeholder="Enter Full Name" />
              </div>
            </div>
            <div class="login__form__block__input w-100">
              <label for="email" class="form-label login__form__block__label fs-5">
                Email
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter email id" />
              </div>
            </div>
            <div class="login__form__block__input w-100">
              <label for="phone" class="form-label login__form__block__label fs-5">
                Phone
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-phone"></i>
                <input type="number" class="form-control form-control-lg" name="phone" id="phone" placeholder="Enter phone" />
              </div>
            </div>
            <div class="login__form__block__input w-100">
              <label for="designation" class="form-label login__form__block__label fs-5">
                Message
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-envelope-open-text"></i>
                <textarea name="message" id="message" class="form-control" cols="10" rows="4" placeholder="Enter full address"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-lg btn-secondary d-inline-flex gap-x-3 align-items-center">
              Send your query
              <i class="fa-solid fa-paper-plane"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Full Width Ad -->
  <section class="post-section">
    <div class="container">
      <div class="ad__cont horizontal">
        <a href="javascript:void(0)">
          <i class="fa-solid fa-ad"></i>
          <picture>
            <!-- <source media="(max-width:650px)" srcset="img_pink_flowers.jpg">
            <source media="(max-width:465px)" srcset="img_white_flower.jpg"> -->
            <img src="https://www.famousmuslimastrologer.com/wp-content/themes/blankslate/images/header_inner.jpg" alt="Ad Image">
          </picture>
        </a>
      </div>
    </div>
  </section>
  @php
     $mostviews = App\Models\Artical::with('user')->orderBy('viewd', 'desc')->limit(5)->get();
    @endphp
    <section class="post-section py-md-5">
        <div class="container">
            <div class="section-heading [ d-flex align-items-center ]">
                <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
                    <span class="white-space-nowrap">Most Popular Articals</span>
                </h2>
                <a href="{{ route('allartical') }}" class="white-space-nowrap [ btn btn-light border hover-dark ]">
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
                              
                                <img src="{{ asset('frontend/assets/img/ad.jpg') }}" alt="Ad Image">
                            </picture>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-xl-9">
                    <div class="row g-5">
                        <div class="col-12 col-lg-7">
                            <div class="row g-5 mobile__scroll">
                                  @forelse($mostviews as $key=> $artical)
                              
                                @if($key<3)

                                <div class="col-12">
                                    <div class="small-cards-container">
                                        <div class="post-content {{($artical->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
                                            <a href="{{ route('articals',$artical->url)}}">
                                          <h4>{{$artical->title}}</h4>
                                            </a>
                                            <div class="post-auth-date [ d-flex ]">
                                                <ul class="d-flex">
                                                    <li>
                                                        <a href="{{ route('articals',$artical->url)}}">
                                                            <i class="fa-solid fa-user"></i>
                                                             {{$artical->user->name??null}}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('articals',$artical->url)}}">
                                                            <i class="fa-solid fa-calendar"></i>
                                                            {{ Carbon\Carbon::parse($artical->created_at)->format('d/m/Y') }}
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
                                                <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                   @endif
                            
                             
                             @empty  
                          <p class="bg-danger text-white p-1">no artical</p>  
                           @endforelse 

                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="medium-cards-container">
                                <div class="post-image">
                                    <a href="javascript:void(0)">
                                        <img src="{{ URL::asset('storage/articals/' . @$mostviews[0]->image) }}" alt="Image" />
                                    </a>
                                </div>
                                <div class="post-content hindi [ d-flex flex-column justify-content-between ]">
                                    <div class="post-auth-date [ d-flex ]">
                                        <ul class="d-flex">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa-solid fa-user"></i>
                                                   {{@$mostviews[0]->user->name??null}}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa-solid fa-calendar"></i>
                                                    {{ Carbon\Carbon::parse(@$mostviews[0]->created_at)->format('d/m/Y') }}
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
                                           {{@$mostviews[0]->artical[0]->title}}
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
                        
                        @forelse ($mostviews as $key=> $artical)  
                     

                       
                       @if(3<=$key ||$key >=5)
                        <div class="col-12 col-lg-6">
                       
                            <div class="small-cards-container">
                                <div class="post-content {{($artical->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
                                   <a href="{{ route('articals',$artical->url)}}">
                                          <h4>{{$artical->title}}</h4>
                                    </a>

                                    <div class="post-auth-date [ d-flex ]">
                                        <ul class="d-flex">
                                            <li>
                                             <a href="{{ route('articals',$artical->url)}}">
                                                            <i class="fa-solid fa-user"></i>
                                                             {{$artical->user->name??null}}
                                                        </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('articals',$artical->url)}}">
                                                            <i class="fa-solid fa-calendar"></i>
                                                            {{ Carbon\Carbon::parse($artical->created_at)->format('d/m/Y') }}
                                                        </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post-image">
                                    <div class="post-tags [ d-flex gap-2 ]">
                                        <a href="{{ route('articals',$artical->url)}}" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
                                    </div>
                                     <a href="{{ route('articals',$artical->url)}}">
                                      <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="">
                                      </a>
                                </div>
                            </div>
                        </div>
                          @endif
                         
                         
                             @empty  
        <p class="bg-danger text-white p-1"></p>  
    @endforelse
                         
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection