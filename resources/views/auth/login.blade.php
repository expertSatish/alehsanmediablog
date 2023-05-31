@extends('frontend.includes.main')

@section('content')
    <section class="login__section mb-5">
        <div class="container [ d-flex gap-5 flex-column ]">
            <div class="login__form__container">
                <div class="left__block">
                    <div class="login__form__cover"
                        style="--cover-bg: url('https://images.unsplash.com/photo-1532012197267-da84d127e765')">
                        <img src="{{ asset('frontend/assets/img/top-logo.svg') }}" alt="Logo" class="logo__image"
                            width="60px" />
                    </div>

                </div>
                <div class="right__block">
                    <x-guest-layout>
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if (Session::has('error'))
                            <div class="mb-4 font-medium text-sm text-red-600">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}" class="login__form__block align-items-start">
                            @csrf
                            <div class="login__form__content w-100">
                                <h1 class="font-gilroy-bold text-primary mb-2">Author Login</h1>
                                <p class="fs-5">Enter your credentials to access your account.</p>
                            </div>

                            <x-jet-validation-errors class="mb-4" />
                            <div class="login__form__block__input w-100">
                                <label for="email" class="form-label login__form__block__label fs-5">
                                    {{ __('Email') }}
                                    <i class="fa-solid fa-star-of-life"></i>
                                </label>
                                <div class="login__form__block__input__box">
                                    <i class="fa-solid fa-user"></i>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        id="email" :value="old('email')" required autofocus>
                                </div>
                            </div>




                            <div class="login__form__block__input w-100">
                                <label for="password" class="form-label login__form__block__label fs-5">
                                    Password
                                    <i class="fa-solid fa-star-of-life"></i>
                                </label>
                                <div class="login__form__block__input__box">
                                    <i class="fa-solid fa-lock"></i>
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        id="password" placeholder="Enter password" required
                                        autocomplete="current-password">
                                </div>
                            </div>


                            <div class="d-flex justify-content-between w-100">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                                </div>
                                <a href="javascript:;" class="link-primary">Forgot Password?</a>
                            </div>
                            <button type="submit"
                                class="btn btn-lg btn-secondary d-inline-flex gap-x-2 align-items-center">
                                Access My Account
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            </button>


                        </form>
                    </x-guest-layout>
                </div>
            </div>
            <div class="author__registration__info [ d-flex gap-5 align-items-center mx-auto ]">
                <div class="__icon">
                    <img src="{{ asset('frontend/assets/img/writting-hand.svg') }}" alt="Writting Hand Icon">
                </div>
                <div class="__content">
                    <h2 class="fs-1 mb-2 font-gilroy-bold text-primary">Don't have an account?</h2>
                    <p class="mb-4 fs-5">
                        Become a member of Al Ehsan Media and write/post your Articles on our platform
                    </p>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg [ d-inline-flex align-items-center gap-3 ]">
                        <i class="fa-solid fa-user-edit"></i>
                        Register as an Author
                    </a>
                </div>
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
