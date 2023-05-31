@extends('frontend.includes.main')

@section('content')
<section class="breadcrumb__section py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 breadcrumb-post-details">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a>Article</a></li>
                <li class="breadcrumb-item"><a> @if($articaldetails->subcategory_id == null)
                    {{$articaldetails->category->name}}@else{{$articaldetails->categoryName->name ?? null}}@endif</a></li>
                <li class="breadcrumb-item active {{ $articaldetails->language_id == '3' ? 'urdu' : 'hindi' }}"
                    aria-current="page">{{ $articaldetails->title }}</li>
            </ol>
        </nav>
    </div>
</section>
<!-- Banner and content -->
<section class="post__content__section">
    <div class="container">
        <div class="post__banner">
            <picture>
                <!-- <source media="(max-width:650px)" srcset="img_pink_flowers.jpg"> -->

                <img src="{{ URL::asset('storage/articals/' . $articaldetails->image) }}"
                    alt="{{ $articaldetails->title }}">
            </picture>
            <div class="post__tags [ d-flex gap-3 flex-wrap align-items-center ]">
                <a class="btn btn-primary"> @if($articaldetails->subcategory_id == null)
                    {{$articaldetails->category->name}}@else{{$articaldetails->categoryName->name ?? null}}@endif</a>
            </div>
        </div>
        <div class="post__content pt-md-4 pt-lg-5 pt-3">
            <div class="post__content__header mb-4">
                <h1 class="fw-bold mb-4">{{ $articaldetails->title }}</h1>
                <div
                    class="post__info [ d-flex flex-wrap gap-2 justify-content-between border-top border-bottom py-2 ]">
                    <ul class="post__info__list">
                        <li>
                            <a href="{{url('/author-listing/'.$articaldetails->user_name)}}">
                                <i class="fa-solid fa-user"></i>
                                <span>{{ $articaldetails->user_name ?? ''}}</span>
                            </a>
                        </li>
                        <li>
                            <i class="fa-solid fa-calendar"></i>
                            <span>{{ Carbon\Carbon::parse($articaldetails->created_at)->format('d/m/Y') }}</span>
                        </li>
                    </ul>
                    <div class="[ d-flex gap-2 ]">
                        <ul class="post__info__list">
                            <li>
                                <i class="fa-solid fa-eye"></i>
                                <span>{{ $articaldetails->viewd }}</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-comments"></i>
                              
                            </li>
                            <li class="countbtnshare" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <input type="hidden" name="name" id="artical_iddd" value="{{ $articaldetails->id }}" />
                                <i class="fa-solid fa-share-from-square"></i>
                                <span> {{ $articaldetails->shared }}</span>
               

                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="post__content__body {{ $articaldetails->language_id == '3' ? 'urdu' : 'hindi' }}">
                {!! $articaldetails->content !!}
            </div>
        </div>
      
        <div class="col-lg-8">
            <div class="single-post__comment">
                <div class="widget__title">
                </div>
            </div>
            @foreach ($articaldetails->comment as $comment)
            <div class="single-post__author__profile">
                <div class="single-post__author__profile__pic">
                    <img src="{{ asset('frontend/assets/img/avatar.png') }}" alt="">
                </div>
                <div class="single-post__author__profile__text">
                    <h4>{{ $comment->name }}.</h4>
                    <p>{{ $comment->message }}</p>

                </div>
            </div>
            @endforeach

            <div class="single-post__leave__comment login__form__block__input__box ">
                <div class="widget__title">
                    <h4>Leave a comment</h4>
                </div>
                <form action="{{ route('comment_post') }}" method="post">
                    @csrf

                    <div class="input-list">
                        <i class="fa fa-user fa-lg"></i>
                        <input type="text" name="name" placeholder="Name" required>
                        <i class="fa-solid fa-envelope fa-lg"></i>
                        <input type="text" name="email" placeholder="Email" required>
                        <i class="fa-solid fa-phone fa-lg"></i>
                        <input type="text" name="phone" placeholder="Phone">
                        <input type="hidden" name="artical_id" value="{{ $articaldetails->id }}">
                    </div>


                    <i class="fa-solid fa-envelope-open-text"></i>
                    <textarea placeholder="Message" name="message"></textarea>
                    <button type="submit" class="btn btn-lg btn-secondary d-inline-flex gap-x-3 align-items-center"
                        fdprocessedid="i9irrk">
                        Submit
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>

                </form>

            </div>

        </div>
    </div>
</section>

<section class="related__articals__section mb-5">
    <div class="container">
        <div class="col-12">
            <div class="section-heading [ d-flex align-items-center mb-5 ]">
                <h2 class="heading-text borderless m-0 font-gilroy-bold text-white fs-1">
                    <span>
                        <span class="font-gilroy-light">Related</span>
                        <span class="font-gilroy-bold">Articles</span>
                    </span>
                </h2>
            </div>
        </div>
        <div class="row g-5 featured__articals__card__container horizontal__scroll">
            @foreach ($relatedarticals as $relatedartical)
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 d-flex">
                <div class="post__listing__card light">
                    <div class="post__listing__card__image">
                        <ul class="__tags">
                            <li><a href="{{ route('articals', $relatedartical->url) }}"
                                    class="btn btn-sm btn-primary tag">@if($relatedartical->subcategory_id == null)
                    {{$relatedartical->category->name}}@else{{$relatedartical->categoryName->name ?? null}}@endif</a></li>
                        </ul>
                        <a href="javascript:;">
                            <img src="{{ URL::asset('storage/articals/' . $relatedartical->image) }}" alt="">
                        </a>
                    </div>
                    <div class="post__listing__card__content urdu">
                        <a href="{{ route('articals', $relatedartical->url) }}">
                            <h4 class="mb-3 fw-bold">{{ $relatedartical->title }}</h4>
                        </a>
                        <p> {!! Str::words(strip_tags($relatedartical->content, 10)) !!}</p>
                        <ul class="post-auth-date d-flex font-roboto mt-4">
                            <li>
                                <a href="javascript:;">
                                    <i class="fa-solid fa-user"></i>
                                    {{ $relatedartical->user_name ?? '' }}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa-solid fa-calendar"></i>
                                    {{ Carbon\Carbon::parse($relatedartical->created_at)->format('d/m/Y') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="_12kfhdn">
                    <section class="justify-content-center">
                        <h2 tabindex="-1" class="_14i3z6h" elementtiming="LCP-target">
                            <div class="_e0px5r">Share this place</div>
                        </h2>

                        <div class="_1byskwn">
                            <div class="_9zsv75f">
                                {!! $shareComponent !!}



                            </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection