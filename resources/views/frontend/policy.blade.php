@extends('frontend.includes.main')
 
@section('content')

 <!-- Hero Banner -->
  <section class="hero__banner__section __dark" style="background-image: url({{('frontend/assets/img/jamia-hero-banner.jpg')}}">
    <div class="container">
      <div class="hero__banner">
        <h3 class="font-gilroy-bold mb-3 fs-1">Privacy Policy</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
          </ol>
        </nav>
      </div>
    </div>
  </section>

  <section class="about__page__section py-md-5 py-2">
    <div class="container mt-5">
      <div class="about__page__container mb-4 mb-md-0">
        <div class="about__page__content">
          <div class="text-center">
            <div class="media__logo mb-5">
              <img src="{{('frontend/assets/img/top-logo.svg')}}" alt="Media Logo" />
            </div>
            <h1 class="font-gilroy-bold text-primary text-uppercase">Al-Ehsan Media</h1>
          </div>
          <hr class="my-md-5 my-4" />
          <div class="d-flex flex-column gap-3">
            <div class="content__block">
              <h3 class="mb-3">{{$policy->title}}</h3>
              <div class="content__block__text">
              {!!$policy->content!!}
               
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
   <section class="post-section" style="margin: 40px;">
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

 


@endsection