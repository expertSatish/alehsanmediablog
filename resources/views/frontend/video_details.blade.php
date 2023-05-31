@extends('frontend.includes.main')
 
@section('content')
<section class="breadcrumb__section py-4">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 breadcrumb-post-details">
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
        <iframe src="{{$videodetails->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="post__content pt-5">
        <div class="post__content__header mb-4">
          <h1 class="fw-bold mb-4 urdu">
           {{$videodetails->title}}
          </h1>
          <div class="post__info [ d-flex flex-wrap gap-2 justify-content-between border-top border-bottom py-2 ]">
            <ul class="post__info__list">
              <li>
                <a href="javascript:;">
                  <i class="fa-solid fa-user"></i>
                  <span> {{$videodetails->user->name}}</span>
                </a>
              </li>
              <li>
                <i class="fa-solid fa-calendar"></i>
                <span>{{ Carbon\Carbon::parse($videodetails->created_at)->format('d/m/Y') }}</span>
              </li>
            </ul>
            <div class="[ d-flex gap-2 ]">
              <ul class="post__info__list">
                <li>
                  <i class="fa-solid fa-eye"></i>
                  <span>{{ $videodetails->viewd }}</span>
                </li>
                <li>
                  <i class="fa-solid fa-comments"></i>
                  <span>{{count($videodetails->comment)}}</span>
                </li>
                <li>
                  <i class="fa-solid fa-share-from-square"></i>
                  <span>{{ $videodetails->shared }}</span>
                </li>
              </ul>
              <ul class="post__info__list __share">
              <li class="countbtnsharevideo" data-bs-toggle="modal" data-bs-target="#staticBackdropddvideo">
                <input type="hidden" name="name" id="video_iddd" value="{{ $videodetails->id }}"/>
                  <i class="fa-solid fa-share-alt"></i>
                </li>
                {{-- <li>
                  <i class="fa-solid fa-share-alt"></i>
                  <ul class="share__with d-none">
                    <li><i class="fa-brands fa-facebook-f"></i></li>
                    <li><i class="fa-brands fa-twitter"></i></li>
                    <li><i class="fa-brands fa-instagram"></i></li>
                    <li><i class="fa-brands fa-whatsapp"></i></li>
                  </ul>
                </li> --}}
              </ul>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="comment__box">
        <h3>Comment Plughin</h3>
      </div> --}}
      <div class="col-lg-8">
                <div class="single-post__comment">
                    <div class="widget__title">
                        <h4>({{ count($videodetails->comment) }}) Comment</h4>
                    </div>
                </div>
                @foreach ($videodetails->comment as $comment)
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
                    <form action="{{ route('comment_post_video') }}" method="post">
                        @csrf

                        <div class="input-list">
                            <i class="fa fa-user fa-lg"></i>
                            <input type="text" name="name" placeholder="Name" required>
                            <i class="fa-solid fa-envelope fa-lg"></i>
                            <input type="text" name="email" placeholder="Email" required>
                            <i class="fa-solid fa-phone fa-lg"></i>
                            <input type="text" name="phone" placeholder="Phone">
                            <input type="hidden" name="video_id" value="{{ $videodetails->id }}">
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
              <span class="font-gilroy-bold">Videos</span>
            </span>
          </h2>
        </div>
      </div>
      <div class="row g-5 featured__articals__card__container horizontal__scroll">
      @foreach ($relateVideos as $relateVideo)
          
      @endforeach
        <div class="col-12 col-md-6 col-lg-4">
          <div class="video__type__card video__type__card__related">
            <div class="video__type__card__image">
              <img src="{{ asset('storage/vedio_cover/'.$relateVideo->vedio_cover) }}" alt="Vidoe Thumbnail">
            </div>
            <div class="video__type__card__content urdu">
              <a href="{{ route('video_details',$relateVideo->url)}}">
                <i class="fa-solid fa-play"></i>
                <h4>{{$relateVideo->title}}</h4>
              </a>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>


  <div class="modal fade" id="staticBackdropddvideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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