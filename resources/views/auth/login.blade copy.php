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
                        <x-jet-authentication-card>
                            <x-slot name="logo">
                                <x-jet-authentication-card-logo />
                            </x-slot>

                            <x-jet-validation-errors class="mb-4" />

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

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div>
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                        required autocomplete="current-password" />
                                </div>

                                <div class="block mt-4">
                                    <label for="remember_me" class="flex items-center">
                                        <x-jet-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                
                                <div class="block mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                        href="{{ route('register') }}">
                                        {{ __('Do You Want To Register') }}
                                    </a>
                                </div>


                                <div class="flex items-center justify-end mt-4">

                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif

                                    <x-jet-button class="ml-4">
                                        {{ __('Log in') }}
                                    </x-jet-button>
                                </div>


                            </form>
                        </x-jet-authentication-card>
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
                  <img src="{{ URL::asset('storage/add_image/' . $ads01->add_image01) }}" alt="Ad Image">
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
                                                <img src="{{ asset('frontend/assets/img/slide-1.png') }}" alt="">
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
                                                <img src="{{ asset('frontend/assets/img/slide-1.png') }}" alt="">
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
                                                <img src="{{ asset('frontend/assets/img/slide-1.png') }}" alt="">
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
                                        <img src="{{ asset('frontend/assets/img/shot-by.jpg') }}" alt="Image" />
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
                                        <img src="{{ asset('frontend/assets/img/slide-1.png') }}" alt="">
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
                                        <img src="{{ asset('frontend/assets/img/slide-1.png') }}" alt="">
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
