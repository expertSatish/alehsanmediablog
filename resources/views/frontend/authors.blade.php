@extends('frontend.includes.main')
 
@section('content')
  <!-- Hero Banner -->
  <section class="hero__banner__section hero__banner__section__authors">
    <div class="container">
      <div class="hero__banner">
        <h3 class="font-gilroy-bold mb-3 fs-1 text-primary">Authors</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Authors</li>
          </ol>
        </nav>
      </div>
    </div>
  </section>

  <section class="author__listing__section">
    <div class="container">
      <div class="author__registration__info [ d-flex gap-5 align-items-center mb-5 ]">
        <div class="__icon">
          <img src="{{asset('frontend/assets/img/writting-hand.svg" alt="Writting Hand Icon" />
        </div>
        <div class="__content">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa quibusdam non possimus repudiandae illum numquam? Dicta eligendi harum ea rerum fuga labore cum voluptatibus corrupti illo, obcaecati
          </p>
          <h3 class="mb-4">
            <strong>Become a member of Al Ehsan Media and write/post your Articles on our platform</strong>
          </h3>
          <a href="javascript:;" class="btn btn-secondary btn-lg [ d-inline-flex align-items-center gap-3 ]">
            Register Now
            <i class="fa-solid fa-long-arrow-right"></i>
          </a>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name">
              <h4>Zeeshan Ahmad Misbahi</h4>
              <small>Teacher, Jamia Arifia, Allahabad</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
          <div class="author__profile__card">
            <div class="author__profile__card__image">
              <img src="{{asset('frontend/assets/img/zishan_misbahi.jpg')}}" alt="Author Image" />
            </div>
            <div class="author__profile__card__name urdu">
              <h4>ذیشان احمد مصباحی</h4>
              <small>استاذ جامعہ عارفیہ، سید سراواں</small>
            </div>
            <a href="javascript:;" class="btn btn-primary [ d-inline-flex align-items-center gap-3 ]">
              <span>Articals (50)</span>
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="pagination__container w-100 d-flex justify-content-center my-5 pt-3">
        <ul class="pagination pagination-lg">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
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
            <!-- <source media="(max-width:650px)" srcset="img_pink_flowers.jpg">
            <source media="(max-width:465px)" srcset="img_white_flower.jpg"> -->
            <img src="https://www.famousmuslimastrologer.com/wp-content/themes/blankslate/images/header_inner.jpg" alt="Ad Image">
          </picture>
        </a>
      </div>
    </div>
  </section>

  <!-- Related Articals -->
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



