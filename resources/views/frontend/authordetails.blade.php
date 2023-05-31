@extends('frontend.includes.main')

@section('content')
<section class="author__profile__banner__section">
    <div class="container">
        @if($users->short_intro_english != null)
        <div
            class="author__profile__banner hindi [ d-flex mobile-flex-wrap ]">
            <div class="author__profile__banner__image">
                <img src="{{ URL::asset('storage/authors/' . $users->profile_photo) }}" alt="Author Image" />
            </div>
            <div class="author__profile__banner__content">
                <h2 class="fs-1 fw-bold mb-4 author__name">{{$users->name}}</h2>
                <p class="author__discription mb-0">
                    {{$users->short_intro_english}}
                </p>
                <ul class="social__links [ d-flex align-items-center gap-2 ]">
                    <li><a href="{{$users->instagram}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="{{$users->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="{{$users->you_tube}}"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
        @elseif($users->short_intro_english && $users->short_intro_urdu != null)
        <div
            class="author__profile__banner hindi [ d-flex mobile-flex-wrap ]">
            <div class="author__profile__banner__image">
                <img src="{{ URL::asset('storage/authors/' . $users->profile_photo) }}" alt="Author Image" />
            </div>
            <div class="author__profile__banner__content">
                <h2 class="fs-1 fw-bold mb-4 author__name">{{$users->name}}</h2>
                <p class="author__discription mb-0">
                    {{$users->short_intro_english}}
                </p>
                <ul class="social__links [ d-flex align-items-center gap-2 ]">
                    <li><a href="{{$users->instagram}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="{{$users->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="{{$users->you_tube}}"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
        @else
        <div
            class="author__profile__banner urdu [ d-flex mobile-flex-wrap ]">
            <div class="author__profile__banner__image">
                <img src="{{ URL::asset('storage/authors/' . $users->profile_photo) }}" alt="Author Image" />
            </div>
            <div class="author__profile__banner__content">
                <h2 class="fs-1 fw-bold mb-4 author__name">{{$users->name}}</h2>
                <p class="author__discription mb-0">
                    {{$users->short_intro_urdu}}
                </p>
                <ul class="social__links [ d-flex align-items-center gap-2 ]">
                    <li><a href="{{$users->instagram}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="{{$users->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="{{$users->you_tube}}"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
    @endif
</section>
<section class="author__tab__header__section mb-5">
    <ul class="author__tab__header">

        <li id="tab-1" class="custom__tab author__tab__header__item active">All Posts ({{ $authorlistcount }})</li>
        <li id="tab-2" class="custom__tab author__tab__header__item">About Author</li>
        <li id="tab-3" class="custom__tab author__tab__header__item ">
            Books ({{ $authorbookcount }})</li>
        @php
        $i = 4;
        @endphp
        @foreach ($categorylis as $categoryli)
        <li id="tab-{{ $i++ }}" class="custom__tab author__tab__header__item ">{{ $categoryli->name }}
            ({{ count($categoryli->articals) }})</li>
        @endforeach
    </ul>
</section>
<section class="author__tab__body">
    <div data-id="tab-1" class="author__tab__data custom__tab__data">
        <div class="container">
            <div class="section-heading [ d-flex align-items-center ]">
                <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-2">
                    <span class="white-space-nowrap">All Posts ({{ $authorlistcount }})</span>
                </h2>
            </div>

            <section class="post-section py-md-5 mt-4">
                <div class="container">
                    <div class="row g-5">
                        @foreach($authorlistingalls as $key => $authorlistingall)
                        @if($key < 3) <div class="col-12 col-md-6 col-lg-4">
                            <div class="medium-cards-container">
                                <div class="post-image">
                                    <a href="javascript:void(0)">
                                        <img src="{{ URL::asset('storage/profile_photo/' . $authorlistingall->profile_photo) }}"
                                            alt="image">
                                    </a>
                                </div>
                                <div
                                    class="post-content {{($authorlistingall->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex flex-column justify-content-between ]">
                                    <div class="post-auth-date [ d-flex ]">
                                        <ul class="d-flex">
                                            <li>
                                                <a href="{{ url('/author-listing', $authorlistingall->user_name) }}">
                                                    <i class="fa-solid fa-user"></i>
                                                    {{ $authorlistingall->name }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa-solid fa-calendar"></i>
                                                    {{ Carbon\Carbon::parse($authorlistingall->created_at)->format('d/m/Y') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <div class="post-tags mb-md-4 mb-4">
                                            <a href="{{ route('articals', $authorlistingall->url)}}"
                                                class="btn btn-primary tag">
                                                @if($authorlistingall->subcategory_id == null)
                                                {{$authorlistingall->category->name}}@else{{$authorlistingall->categoryName->name ?? null}}@endif</a>
                                        </div>
                                        <a href="{{ route('articals',$authorlistingall->url)}}">
                                            <h3 class="m-0 post-heading">
                                                {{$authorlistingall->title}}
                                            </h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @elseif($key >= 3 && $key < 7) <div class="col-12 col-md-4 col-lg-6">
                        <div class="row g-5 mobile__scroll">
                            <div class="col-12">
                                <div class="small-cards-container">
                                    <div
                                        class="post-content {{($authorlistingall->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
                                        <a href="{{ route('articals',$authorlistingall->url)}}">
                                            <h4>{{$authorlistingall->title}}</h4>
                                        </a>
                                        <div class="post-auth-date [ d-flex ]">
                                            <ul class="d-flex">
                                                <li>
                                                    <a
                                                        href="{{ url('/author-listing/'.$authorlistingall->user_name) }}">
                                                        <i class="fa-solid fa-user"></i>
                                                        {{$authorlistingall->user_name ?? ''}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('articals',$authorlistingall->url)}}">
                                                        <i class="fa-solid fa-calendar"></i>
                                                        {{ Carbon\Carbon::parse($authorlistingall->created_at)->format('d/m/Y') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post-image">
                                        <div class="post-tags [ d-flex gap-2 ]">
                                            <a href="{{ route('articals',$authorlistingall->url)}}"
                                                class="btn btn-primary btn-sm">

                                                @if($authorlistingall->subcategory_id == null)
                                                {{$authorlistingall->category->name}}@else{{$authorlistingall->categoryName->name ?? null}}@endif

                                            </a>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <img src="{{ URL::asset('storage/articals/' . $authorlistingall->image) }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @else
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="post__listing__card">
                        <div class="post__listing__card__image">
                            <ul class="__tags">
                                <li><a href="{{ route('articals',$authorlistingall->url)}}" class="btn btn-sm btn-primary tag">

                                        @if($authorlistingall->subcategory_id == null)
                                        {{$authorlistingall->category->name}}@else{{$authorlistingall->categoryName->name ?? null}}@endif

                                    </a></li>
                            </ul>
                            <a href="{{ route('articals',$authorlistingall->url)}}">
                                <img src="{{ URL::asset('storage/articals/' . $authorlistingall->image) }}"
                                    alt="Listing Image" />
                            </a>
                        </div>
                        <div class="post__listing__card__content {{($authorlistingall->language_id == 3) ? 'urdu' : 'hindi'}}">
                            <a href="{{ route('articals',$authorlistingall->url)}}">
                                <h4 class="mb-3 fw-bold">
                                    {{$authorlistingall->title}}</h4>
                            </a>
                            <p> {!!Str::words(strip_tags($authorlistingall->content, 20))!!}</p>
                            <ul class="post-auth-date d-flex font-roboto mt-4">
                                <li>
                                    <a href="{{ url('/author-listing/'.$authorlistingall->user_name) }}">
                                        <i class="fa-solid fa-user"></i>
                                        {{$authorlistingall->user->name??null}}
                                    </a>
                                </li>
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
                @endif
                @endforeach

        </div>
    </div>
</section>

<div class="pagination__container w-100 d-flex justify-content-center my-5 pt-3">
    <ul class="pagination pagination-lg">
        {{ $authorlistingalls->links('pagination::bootstrap-4') }}
    </ul>
</div>
</div>
</div>
<div data-id="tab-2" class="author__tab__data active">
    <div class="container">
        <div class="section-heading [ d-flex align-items-center ]">
            <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-2">
                <span class="white-space-nowrap">Author Profile</span>
            </h2>
        </div>
        <div class="author__profile__container  [ d-flex flex-column mb-3 ]">
            <div class="content__block">
                <div class="content__block__text [ d-flex gap-md-5 gap-3 mobile-flex-wrap ]">
                    <p>
                    <p> {!!Str::words(strip_tags($users->about_us))!!}</p>

                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
<div data-id="tab-3" class="author__tab__data ">
    <div class="container">
        <div class="section-heading [ d-flex align-items-center ]">
            <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-2">
                <span class="white-space-nowrap">Books ({{ $authorbookcount }})</span>
            </h2>
        </div>
        <div class="books__section mb-5">
            <div class="row g-5">
                @foreach ($authorbooks as $authorbook)
                <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
                    <div class="book__short__card">
                        <div class="book__short__card__image">
                            <a href="{{ route('book_details', $authorbook->url) }}">
                                <img src="{{ asset('storage/book_image/' . $authorbook->book_image) }}"
                                    alt="Book Mockup" />
                            </a>
                        </div>
                        <div
                            class="book__short__card__content {{($authorlistingall->language_id=='3') ? 'urdu' : 'hindi'}}">
                            <h3> {{ $authorbook->title }}</h3>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@php
$i = 4;
@endphp

@foreach ($categorylis as $categoryl)
<div data-id="tab-{{ $i++ }}" class="author__tab__data">
    <div class="container">
        <div class="section-heading [ d-flex align-items-center ]">
            <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-2">
                <span class="white-space-nowrap">{{ $categoryl->name }}
                    ({{ count($categoryl->articals) }})</span>
            </h2>

        </div>
        <div class="row g-5">
            @foreach ($categoryl->articals as $artical)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="post__listing__card">
                    <div class="post__listing__card__image">
                        <ul class="__tags">
                            <li><a href="{{ route('articals',$artical->url)}}"
                                    class="btn btn-sm btn-primary tag">@if($artical->subcategory_id == null)
                                    {{$artical->category->name}}@else{{$artical->categoryName->name ?? null}}@endif</a>
                            </li>
                        </ul>
                        <a href="{{ route('articals',$artical->url)}}">
                            <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="">
                        </a>
                    </div>
                    <div class="post__listing__card__content {{($artical->language_id=='3') ? 'urdu' : 'hindi'}}">
                        <a href="{{ route('articals',$artical->url)}}">
                            <h4 class="mb-3 fw-bold">{{$artical->title}}</h4>
                        </a>

                        <p> {!!Str::words(strip_tags($artical->content, 20))!!}</p>
                        <ul class="post-auth-date d-flex font-roboto mt-4">
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
            </div>
            @endforeach


        </div>
    </div>
</div>
@endforeach


</section>

<section class="post-section">
    <div class="container">
        <div class="ad__cont horizontal">
            <a href="javascript:void(0)">
                <i class="fa-solid fa-ad"></i>
                <picture>
                    <!-- <source media="(max-width:650px)" srcset="img_pink_flowers.jpg">
              <source media="(max-width:465px)" srcset="img_white_flower.jpg"> -->
                    <img src="{{ URL::asset('storage/add_image/' . $ads01->add_image02) }}" alt="Ad Image">
                </picture>
            </a>
        </div>
    </div>
</section>
@php
$mostviews =
App\Models\Artical::with('user')->where('status','active')->where('aproved','active')->orderBy('viewd','desc')->limit(7)->get();
@endphp

<section class="post-section py-md-5">
    <div class="container">
        <div class="section-heading  [ d-flex align-items-center ]">
            <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
                <span class="white-space-nowrap">Recent Articals</span>
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

                            <img src="{{ URL::asset('storage/add_image/' . $ads01->add_image01) }}" alt="Ad Image">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-9">
                <div class="row g-5">
                    <div class="col-12 col-lg-7">
                        <div class="row g-5 mobile__scroll">
                            @foreach($mostviews as $key=> $artical)
                            @if($key<3) <div class="col-12">
                                <div class="small-cards-container">
                                    <div
                                        class="post-content {{($artical->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
                                        <a href="{{ route('articals',$artical->url)}}">
                                            <h4>{{$artical->title}}</h4>
                                        </a>
                                        <div class="post-auth-date [ d-flex ]">
                                            <ul class="d-flex">
                                                <li>
                                                    <a href="{{ url('/author-listing/'.$artical->user_name) }}">
                                                        <i class="fa-solid fa-user"></i>
                                                        {{$artical->user_name ?? ''}}
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
                                            <a href="{{ route('articals',$artical->url)}}"
                                                class="btn btn-primary btn-sm">

                                                @if($artical->subcategory_id == null)
                                                {{$artical->category->name}}@else{{$artical->categoryName->name ?? null}}@endif

                                            </a>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="">
                                        </a>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @if($mustView)
                <div class="col-12 col-lg-5">
                    <div class="medium-cards-container">
                        <div class="post-image">
                            <a href="javascript:void(0)">
                                <img src="{{ URL::asset('storage/articals/' . $mustView->image ?? '') }}" alt="Image" />
                            </a>
                        </div>
                        <div class="post-content {{($mustView->language_id=='3') ? 'urdu' : 'hindi'}}" [ d-flex
                            flex-column justify-content-between ]">
                            <div class="post-auth-date [ d-flex ]">
                                <ul class="d-flex">
                                    <li>
                                        <a href="{{ url('/author-listing/'.$mustView->user_name) }}">
                                            <i class="fa-solid fa-user"></i>
                                            {{$mustView->user_name ?? ''}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa-solid fa-calendar"></i>
                                            {{ Carbon\Carbon::parse($mustView->created_at)->format('d/m/Y') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="post-tags mb-md-4 mb-4">
                                    <a href="{{ route('articals',$mustView->url)}}" class="btn btn-primary tag">

                                        @if($mustView->subcategory_id == null)
                                        {{$mustView->category->name}}@else{{$mustView->categoryName->name ?? null}}@endif

                                    </a>
                                </div>
                                <a href="{{ route('articals',$mustView->url)}}">
                                    <h3 class="m-0 post-heading">
                                        {!! substr(strip_tags($mustView->content ?? ''), 0,150)!!}
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="row g-5 mobile__scroll">
                @foreach($mostviews as $key=> $artical)
                @if(3<=$key ||$key>=5)
                    <div class="col-12 col-lg-6">

                        <div class="small-cards-container">
                            <div
                                class="post-content {{($artical->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
                                <a href="{{ route('articals',$artical->url)}}">
                                    <h4>{{$artical->title}}</h4>
                                </a>

                                <div class="post-auth-date [ d-flex ]">
                                    <ul class="d-flex">
                                        <li>
                                            <a href="{{ url('/author-listing/'.$artical->user_name) }}">
                                                <i class="fa-solid fa-user"></i>
                                                {{$artical->user_name ?? ''}}
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
                                    <a href="{{ route('articals',$artical->url)}}" class="btn btn-primary btn-sm">

                                        @if($artical->subcategory_id == null)
                                        {{$artical->category->name}}@else{{$artical->categoryName->name ?? null}}@endif

                                    </a>
                                </div>
                                <a href="{{ route('articals',$artical->url)}}">
                                    <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

            </div>
        </div>
    </div>
</section>

@endsection