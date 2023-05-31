@extends('frontend.includes.main')
 
@section('content')

  <section class="breadcrumb__section py-4">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('bookall')}}">Books & Magazines</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$bookdetails->title}}</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Banner and content -->
  <section class="post__content__section">
    <div class="container">
      <div class="post__book__cover">
        <picture>
          <!-- <source media="(max-width:465px)" srcset="img_white_flower.jpg"> -->
          <img src="{{ asset('storage/book_cover/'.$bookdetails->book_cover) }}" alt="Ad Image">
        </picture>
      </div>
      <div class="post__content pt-5">
        <div class="post__content__header mb-4">
          <div class="post__info [ d-flex justify-content-between border-top border-bottom py-2 ]">
            <ul class="post__info__list">
              <li>
                <a href="{{ route('authorlisting', $bookdetails->user->name) }}">
                  <i class="fa-solid fa-user"></i>
                  <span> {{$bookdetails->user->name}}</span>
                </a>
              </li>
              <li>
                <i class="fa-solid fa-calendar"></i>
                <span>{{ Carbon\Carbon::parse($bookdetails->created_at)->format('d/m/Y') }}</span>
              </li>
            </ul>
            <div class="[ d-flex gap-2 ]">
              <ul class="post__info__list">
                <li>
                  <i class="fa-solid fa-eye"></i>
                  <span>{{$bookdetails->viewd }}</span>
                </li>
                <li>
                  <i class="fa-solid fa-comments"></i>
                  <span>{{ count($bookdetails->comment) }} </span>
                </li>
                <li>
                <i class="fa-solid fa-share-from-square"></i>
                <span> {{ $bookdetails->shared }}</span>
                </li>
              </ul>
              <ul class="post__info__list __share">
                <li class="countbtnsharebook" data-bs-toggle="modal" data-bs-target="#staticBackdropdd">
                <input type="hidden" name="name" id="book_iddd" value="{{ $bookdetails->id }}"/>
                  <i class="fa-solid fa-share-alt"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="post__content__body">
          <div class="post__book__cover__details">
            <table class="table table-bordered table-striped mb-4">
              <tbody>
              @if($bookdetails->title)
                <tr>
                  <th scope="row">Name</th>
                  <td>{{$bookdetails->title}}</td>
                </tr>
                @endif
                @if($bookdetails->editor)
                <tr>
                  <th scope="row">Editor</th>
                  <td>{{$bookdetails->editor}}</td>
                </tr>
                @endif
                @if($bookdetails->compilers)
                <tr>
                  <th scope="row">Compilers</th>
                  <td>{{$bookdetails->compilers}}</td>
                </tr>
                @endif
                @if($bookdetails->assistants)
                <tr>
                  <th scope="row">Assistants</th>
                  <td>{{$bookdetails->assistants}}</td>
                </tr>
                @endif
                @if($bookdetails->user->name)
                <tr>
                  <th scope="row">Author</th>
                  <td>{{$bookdetails->user->name}}</td>
                </tr>
                @endif
                @if($bookdetails->translator)
                <tr>
                  <th scope="row">Translator</th>
                  <td>{{$bookdetails->translator}}</td>
                </tr>
                @endif
                @if($bookdetails->researchanalysis)
                <tr>
                  <th scope="row">Research and analysis</th>
                  <td>{{$bookdetails->researchanalysis}}</td>
                </tr>
                @endif
                @if($bookdetails->totalpages)
                <tr>
                  <th scope="row">Total Pages</th>
                  <td>{{$bookdetails->totalpages}}</td>
                </tr>
                @endif
                @if($bookdetails->publisher)
                <tr>
                  <th scope="row">Publisher</th>
                  <td>{{$bookdetails->publisher}}</td>
                </tr>
                @endif
                @if($bookdetails->publicationdate)
                <tr>
                  <th scope="row">Publication Date</th>
                  <td>{{$bookdetails->publicationdate}}</td>
                </tr>
                @endif
              </tbody>
            </table>
            <div class="cta__buttons d-flex justify-content-between align-items-center border-top border-bottom py-3">
              <a href="https://pages.razorpay.com/AlehsanMedia" target="blank" class="btn btn-secondary btn-lg d-flex gap-4 align-items-center">
                Donate Now
                <i class="fa-solid fa-circle-dollar-to-slot"></i>
              </a>   
              @if($bookdetails->book_pdf!=null)
               <a href="{{ asset('storage/files/'.$bookdetails->book_pdf) }}" class="btn btn-lg d-flex gap-4 align-items-center hover-primary">
                Download 
                <i class="fa-solid fa-download"></i>
              </a>
                @else 
                 <a href="/{{$bookdetails->pdf_url}}" class="btn btn-lg d-flex gap-4 align-items-center hover-primary">
                Download 
                <i class="fa-solid fa-download"></i>
              </a>        
              @endif 

             
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
                    
                        <h4>({{ count($bookdetails->comment) }}) Comment</h4>
                    </div>
                </div>
                @foreach ($bookdetails->comment as $comment)
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

                <div class="single-post__leave__comment">
                    <div class="widget__title">
                        <h4>Leave a comment</h4>
                    </div>
                    <form action="{{ route('comment_post_book') }}" method="post">
                        @csrf
                        <i class="fa-solid fa-envelope-open-text"></i>
                        <textarea placeholder="Message" type="text" class="form-control" name="message"></textarea>
                        
                        <div class="input-list">
                            <i class="fa fa-user fa-lg"></i>
                            <input type="text" name="name" placeholder="Name" required>
                            <i class="fa-solid fa-envelope fa-lg"></i>
                            <input type="email" name="email" placeholder="Email" required>
                            <i class="fa-solid fa-phone fa-lg"></i>
                            <input type="text" name="phone" placeholder="Phone">
                            <input type="hidden" name="book_id" value="{{ $bookdetails->id }}">
                        </div>
                       
                      
                          <button type="submit" class="btn btn-lg btn-secondary d-inline-flex gap-x-3 align-items-center"
                            fdprocessedid="i9irrk">
                            Submit
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                        {{-- <button type="submit" class="site-btn" fdprocessedid="2yq1w">Submit</button> --}}
                    </form>
                </div>
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
                <span class="font-gilroy-bold">Books</span>
              </span>
            </h2>
          </div>
        </div>
        @foreach($books as $res)
        <div class="col-12 col-md-6 col-lg-4">
          <div class="video__type__card video__type__card__related">
            <div class="video__type__card__image">
              <img src="{{ asset('storage/book_image/'.$res->book_image) }}" alt="Ad Image">
            </div>
          </div>
        </div>
        @endforeach
       
      </div>
    </div>
  </section>

 <div class="modal fade" id="staticBackdropdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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




