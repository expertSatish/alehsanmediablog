@extends('frontend.includes.main')
 
@section('content')
  
   @include('frontend.includes.home-slider')

  <!-- Recent Articles -->
  <section class="post-section py-md-5">
    <div class="container">
      <div class="section-heading [ d-flex align-items-center ]">
        <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
          <span class="white-space-nowrap">Recent Articles</span>
        </h2>
        <a href="{{ route('allartical') }}" class="white-space-nowrap [ btn btn-light border hover-dark ]">
          View All 
          <i class="fa-solid fa-long-arrow-right"></i>
        </a>
      </div>
      <div class="row g-5 align-items-stretch">
        <div class="col-12 col-lg-6 gap-4 d-flex flex-column">
          
          <div class="row g-5 mobile__scroll">
          @foreach($recentArticles as $artical)
          <div class="col-12">
            <div class="small-cards-container">
              <div class="post-content {{($artical->language_id == 3) ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
                <a href="{{ route('articals',$artical->url)}}">
                <h4>{{$artical->title}}</h4>
                </a>
                <div class="post-auth-date [ d-flex ]">
                  <ul class="d-flex">
                    <li>
                      <a href="{{ route('authorlisting', $artical->user_name ?? '') }}">
                        <i class="fa-solid fa-user"></i>
                       {{$artical->user_name ?? ''}}
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">
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
                    @if($artical->subcategory_id == null) {{$artical->category->name}}@else{{$artical->categoryName->name ?? null}}@endif
                  </a>
                </div>
                <a href="javascript:void(0)">
                  <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="">
                </a>
              </div>
            </div>
          </div>
           @endforeach
           </div>
        </div>
        
      @if (!empty($articalone))
      <div class="col-12 col-lg-6">
          <div class="col-12 d-flex h-100">
            <div class="medium-cards-container">
              <div class="post-image">
                <a href="javascript:void(0)">
                  <img src="{{ URL::asset('storage/articals/' . $articalone->image) }}" alt="">
                </a>
              </div>
              <div class="post-content hindi [ d-flex flex-column justify-content-between ]">
                <div class="post-auth-date [ d-flex ]">
                  <ul class="d-flex">
                    <li>
                      <a href="{{url('/author-listing/'.$articalone->user_name)}}">
                        <i class="fa-solid fa-user"></i>
                        {{$articalone->user_name ?? ''}}
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <i class="fa-solid fa-calendar"></i>
                        {{ Carbon\Carbon::parse($articalone->created_at)->format('d/m/Y') }}
                      </a>
                    </li>
                  </ul>
                </div>
                <div>
                  <div class="post-tags mb-md-4 mb-4">
                    <a href="{{ route('articals',$articalone->url)}}" class="btn btn-primary tag">
                      @if($articalone->subcategory_id == null) {{$articalone->category->name}}@else{{$articalone->categoryName->name ?? null}}@endif

                    </a>
                  </div>
                  <a href="{{ route('articals',$articalone->url)}}">
                    <h3 class="m-0 post-heading">
                    {{$articalone->title}}
                    </h3>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
 
       @endif
 
      </div>
    </div>
  </section>

  <!-- Featured Articles -->
  <section class="post-section py-md-5">
    <div class="container">
      <div class="section-heading [ d-flex align-items-center ]">
        <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
          <span class="white-space-nowrap">Most Popular Articles</span>
        </h2>
        <a href="{{ route('allartical') }}" class="white-space-nowrap [ btn btn-light border hover-dark ]">
          View All 
          <i class="fa-solid fa-long-arrow-right"></i>
        </a>
      </div>
      <div class="row g-5 featured__articals__card__container horizontal__scroll">
       @foreach($mostPopular as $key=>$artical)
       @if($key < 3)
        <div class="col-12 col-lg-6 col-xl-4">
          <div class="medium-cards-container">
            <div class="post-image">
              <a href="javascript:void(0)">
               <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="Image">
              </a>
            </div>
            <div class="post-content {{($artical->language_id == 3) ? 'urdu' : 'hindi'}} [ d-flex flex-column justify-content-between ]">
              <div class="post-auth-date [ d-flex ]">
                <ul class="d-flex">
                  <li>
                    <a href="{{url('/author-listing/'.$artical->user_name)}}">
                      <i class="fa-solid fa-user"></i>
                      {{$artical->user_name ?? ''}}
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fa-solid fa-calendar"></i>
                      {{ Carbon\Carbon::parse($artical->created_at)->format('d/m/Y') }}
                    </a>
                  </li>
                </ul>
              </div>
              <div>
                <div class="post-tags mb-md-4 mb-4">
                  <a href="{{ route('articals',$artical->url)}}" class="btn btn-primary tag">
                  @if($artical->subcategory_id == null) {{$artical->category->name}}@else{{$artical->categoryName->name ?? null}}@endif
                  </a>
                </div>
                <a href="{{ route('articals',$artical->url)}}">
                  <h3 class="m-0 post-heading">
                  {{$artical->title}}

                  </h3>
                </a>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="col-12 col-lg-6">
          <div class="small-cards-container">
            <div class="post-content {{($artical->language_id == 3) ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
              <a href="{{ route('articals',$artical->url)}}">
                <h4>{{$artical->title}}</h4>
              </a>
              <div class="post-auth-date [ d-flex ]">
                <ul class="d-flex">
                  <li>
                    <a href="{{url('/author-listing/'.$artical->user_name)}}">
                      <i class="fa-solid fa-user"></i>
                      {{$artical->user_name ?? ''}}
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
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
                    @if($artical->subcategory_id == null) {{$artical->category->name}}@else{{$artical->categoryName->name ?? null}}@endif
                  </a>
              </div>
              <a href="javascript:void(0)">
                 <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="image">
              </a>
            </div>
          </div>
        </div>
        @endif

        @endforeach
        </div>
       

        
               
      
    </div>
  </section>
  <!-- Articles Types -->
  <section class="post-section read__articals__section text-center">
    <div class="container">
      <div class="col-12">
        <div class="section-heading [ d-flex align-items-center ]">
          <h2 class="heading-text borderless m-0 font-gilroy-bold text-white fs-1">
            <span>
              <span class="font-gilroy-light">Read our</span>
              <span class="font-gilroy-bold">Articles</span>
              <span class="font-gilroy-light">in</span>
              <span class="font-gilroy-bold">Various Languages</span>
            </span>
          </h2>
        </div>
      </div>
      <div class="row g-4 horizontal__scroll">
        <div class="col-12 col-md-6 col-xl-3">
          <div class="artical__type__card __urdu">
            <div class="artical__type__card__image" style="background-image: url('{{ asset('frontend/assets/img/urdu__artical__image.png')}}')"></div>

            <div class="artical__type__card__content [ d-flex flex-column align-items-center justify-content-end gap-3 text-light ]">
              <h4 class="font-gilroy-bold">Urdu Articles ({{$articalurducount}}+)</h4>
              
              <a class="btn btn-outline-light d-flex gap-3 align-items-center" href="{{ route('urduartical') }}">  View All <i class="fa-solid fa-long-arrow-right"></i></a>
               
                
              
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
          <div class="artical__type__card __hindi">
            <div class="artical__type__card__image" style="background-image: url('{{ asset('frontend/assets/img/hindi__artical__image.png')}}')"></div>
            <div class="artical__type__card__content [ d-flex flex-column align-items-center justify-content-end gap-3 text-light ]">
              <h4 class="font-gilroy-bold">Hindi Articles ({{$articalhindicount}}+)</h4>
                <a class="btn btn-outline-light d-flex gap-3 align-items-center" href="{{ route('hindihartical') }}">  View All <i class="fa-solid fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
          <div class="artical__type__card __arabic">
            <div class="artical__type__card__image" style="background-image: url('{{ asset('frontend/assets/img/arabic__artical__image.png')}}')"></div>
            <div class="artical__type__card__content [ d-flex flex-column align-items-center justify-content-end gap-3 text-light ]">
              <h4 class="font-gilroy-bold">Arabic Articles ({{$articalarbiccount}}+)</h4>
               <a class="btn btn-outline-light d-flex gap-3 align-items-center" href="{{ route('arbicartical') }}">  View All <i class="fa-solid fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
          <div class="artical__type__card __english">
            <div class="artical__type__card__image" style="background-image: url('{{ asset('frontend/assets/img/hindi__artical__image.png')}}')"></div>
            <div class="artical__type__card__content [ d-flex flex-column align-items-center justify-content-end gap-3 text-light ]">
              <h4 class="font-gilroy-bold">English Articles ({{$articalenglishcount}}+)</h4>
                 <a class="btn btn-outline-light d-flex gap-3 align-items-center" href="{{ route('englishartical') }}">  View All <i class="fa-solid fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Hindi Articles -->
  <section class="post-section py-md-5">
    <div class="container">
      <div class="section-heading  [ d-flex align-items-center ]">
        <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
          <span class="white-space-nowrap">Hindi Articles</span>
        </h2>
        <a href="{{ route('hindihartical') }}" class="white-space-nowrap [ btn btn-light border hover-dark ]">
          View All 
          <i class="fa-solid fa-long-arrow-right"></i>
        </a>
      </div>
      <div class="row g-5">        
        <div class="col-12 col-lg-4 col-xl-3">
          <div class="ad__cont vertical">
            <a href="javascript:void(0)">
              <i class="fa-solid fa-ad"></i>
              <picture>
                <img src="{{ URL::asset('storage/add_image/' . $ads01->add_image01) }}" alt="Ad Image">
              </picture>
            </a>
          </div>
        </div>
        <div class="col-12 col-lg-8 col-xl-9">
          <div class="row g-5">
            <div class="col-12 col-lg-7">
              <div class="row g-5">
                @foreach ($articalhindi as $articalhind)
                  <div class="col-12">
                    <div class="small-cards-container">
                      <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
                        <a href="{{ route('articals',$articalhind->url)}}">
                          <h4>{{$articalhind->title}}</h4>
                        </a>
                        <div class="post-auth-date [ d-flex ]">
                          <ul class="d-flex">
                            <li>
                              <a href="{{url('/author-listing/'.$articalhind->user_name)}}">
                                <i class="fa-solid fa-user"></i>
                                {{$articalhind->user_name ?? ''}}
                              </a>
                            </li>
                            <li>
                              <a href="javascript:;">
                                <i class="fa-solid fa-calendar"></i>
                              {{ Carbon\Carbon::parse($articalhind->created_at)->format('d/m/Y') }}
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="post-image">
                        <div class="post-tags [ d-flex gap-2 ]">
                          <a href="{{ route('articals',$articalhind->url)}}" class="btn btn-primary btn-sm">
                      
                            @if($articalhind->subcategory_id == null) {{$articalhind->category->name}}@else{{$articalhind->categoryName->name ?? null}}@endif


                          </a>
                        </div>
                        <a href="javascript:void(0)">
                        <img src="{{ URL::asset('storage/articals/' . $articalhind->image) }}" alt="image">
                          
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
           @if (!empty($articalhindione))
            <div class="col-12 col-lg-5">
              <div class="medium-cards-container">
                <div class="post-image">
                  <a href="javascript:void(0)">
                    <img src="{{ URL::asset('storage/articals/' . $articalhindione->image) }}" alt="Image" />
                  </a>
                </div>
                <div class="post-content hindi [ d-flex flex-column justify-content-between ]">
                  <div class="post-auth-date [ d-flex ]">
                    <ul class="d-flex">
                      <li>
                        <a href="{{url('/author-listing/'.$articalhindione->user_name)}}">
                          <i class="fa-solid fa-user"></i>
                          {{$articalhindione->user_name ?? ''}}
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;">
                          <i class="fa-solid fa-calendar"></i>
                          {{ Carbon\Carbon::parse($articalhindione->created_at)->format('d/m/Y') }}
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div>
                    <div class="post-tags mb-md-4 mb-4">
                      <a href="{{ route('articals',$articalhindione->url)}}" class="btn btn-primary tag">
                      @if($articalhindione->subcategory_id == null) {{$articalhindione->category->name}}@else{{$articalhindione->categoryName->name ?? null}}@endif

                      </a>
                    </div>
                    <a href="{{ route('articals',$articalhindione->url)}}">
                      <h3 class="m-0 post-heading">
                       {{$articalhindione->title}}
                      </h3>
                    </a>
                  </div>
                </div>
              </div>
            </div>
             @endif
          </div>
        </div>
  </section>
  <!-- Arabic and English Articles -->
  <section class="post-section py-md-5">
    <div class="container">      
      <div class="row g-5">
        <div class="col-12 col-lg-6">
          <div class="section-heading arabic [ d-flex align-items-center ]">
            <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
              <span class="white-space-nowrap">Arabic Articles</span>
            </h2>
            <a href="{{ route('arbicartical') }}" class="white-space-nowrap [ btn btn-light border hover-dark ]">
              View All 
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
         @if (!empty($articalarbicone))
          <div class="row g-4">
            <div class="col-12">
              <div class="medium-cards-container medium-small-cards-container">
                <div class="post-image">
                  <a href="javascript:void(0)">
                     <img src="{{ URL::asset('storage/articals/' . $articalarbicone->image) }}" alt="image">
                  </a>
                </div>
                <div class="post-content arabic [ d-flex flex-column justify-content-between ]">
                  <div class="post-auth-date [ d-flex ]">
                    <ul class="d-flex">
                      <li>
                      <a href="{{url('/author-listing/'.$articalarbicone->user_name)}}">
                          <i class="fa-solid fa-user"></i>
                          {{$articalarbicone->user_name ?? ''}}
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;">
                          <i class="fa-solid fa-calendar"></i>
                          {{ Carbon\Carbon::parse($articalarbicone->created_at)->format('d/m/Y') }}
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div>
                    <div class="post-tags mb-md-4 mb-4">
                      <a href="{{ route('articals',$articalarbicone->url)}}" class="btn btn-primary tag">
                        
                          @if($articalarbicone->subcategory_id == null) {{$articalarbicone->category->name}}@else{{$articalarbicone->categoryName->name ?? null}}@endif

                        </a>
                    </div>
                    <a href="{{ route('articals',$articalarbicone->url)}}">
                      <h3 class="m-0 post-heading">
                      {{$articalarbicone->title}}
                      </h3>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @foreach ($articalarbic as $articalarbi)
              <div class="col-12">
              <div class="small-cards-container">
                <div class="post-content arabic [ d-flex justify-content-between flex-column  ]">
                  <a href="{{ route('articals',$articalarbi->url)}}">
                    <h4>{{$articalarbi->title}}</h4>
                  </a>
                  <div class="post-auth-date [ d-flex ]">
                    <ul class="d-flex">
                      <li>
                      <a href="{{url('/author-listing/'.$articalarbi->user_name)}}">
                          <i class="fa-solid fa-user"></i>
                            {{$articalarbi->user_name ?? ''}}
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;">
                          <i class="fa-solid fa-calendar"></i>
                          {{ Carbon\Carbon::parse($articalarbi->created_at)->format('d/m/Y') }}
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="post-image">
                  <div class="post-tags [ d-flex gap-2 ]">
                    <a href="{{ route('articals',$articalarbi->url)}}" class="btn btn-primary btn-sm"> 
                    @if($articalarbi->subcategory_id == null) {{$articalarbi->category->name}}@else{{$articalarbi->categoryName->name ?? null}}@endif

                      
                      </a>
                  </div>
                  <a href="javascript:void(0)">
                    <img src="{{ URL::asset('storage/articals/' . $articalarbi->image) }}" alt="image">
                  </a>
                </div>
              </div>
            </div>
            @endforeach
          
             
          </div>
        @endif
        </div>
        <div class="col-12 col-lg-6">
          <div class="section-heading english [ d-flex align-items-center ]">
            <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
              <span class="white-space-nowrap">English Articles</span>
            </h2>
            <a href="{{ route('englishartical') }}" class="white-space-nowrap [ btn btn-light border hover-dark ]">
              View All 
              <i class="fa-solid fa-long-arrow-right"></i>
            </a>
          </div>
            @if (!empty($articalenglishone))
          <div class="row g-4">
            <div class="col-12">
              <div class="medium-cards-container medium-small-cards-container">
                <div class="post-image">
                  <a href="{{ route('englishartical') }}">
                  <img src="{{ URL::asset('storage/articals/' . $articalenglishone->image) }}" alt="image">
                   
                  </a>
                </div>
                <div class="post-content [ d-flex flex-column justify-content-between ]">
                  <div class="post-auth-date [ d-flex ]">
                    <ul class="d-flex">
                      <li>
                      <a href="{{url('/author-listing/'.$articalenglishone->user_name)}}">
                          <i class="fa-solid fa-user"></i>
                         {{$articalenglishone->user_name ?? ''}}
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;">
                          <i class="fa-solid fa-calendar"></i>
                          {{ Carbon\Carbon::parse($articalenglishone->created_at)->format('d/m/Y') }}
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div>
                    <div class="post-tags mb-md-4 mb-4">
                      <a href="{{ route('articals',$articalenglishone->url)}}" class="btn btn-primary tag">
                       
                        @if($articalenglishone->subcategory_id == null) {{$articalenglishone->category->name}}@else{{$articalenglishone->categoryName->name ?? null}}@endif

                      </a>
                    </div>
                    <a href="{{ route('articals',$articalenglishone->url)}}">
                      <h3 class="m-0 post-heading">
                        {{$articalenglishone->title}}
                      </h3>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @foreach ($articalenglish as $articalenglish)
            <div class="col-12">
              <div class="small-cards-container">
                <div class="post-content [ d-flex justify-content-between flex-column  ]">
                  <a href="{{ route('articals',$articalenglish->url)}}">
                    <h4>{{$articalenglish->title}}</h4>
                  </a>
                  <div class="post-auth-date [ d-flex ]">
                    <ul class="d-flex">
                      <li>
                      <a href="{{url('/author-listing/'.$articalenglish->user_name)}}">
                          <i class="fa-solid fa-user"></i>
                          {{$articalenglish->user_name ?? ''}}
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;">
                          <i class="fa-solid fa-calendar"></i>
                         {{ Carbon\Carbon::parse($articalenglish->created_at)->format('d/m/Y') }}
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="post-image">
                  <div class="post-tags [ d-flex gap-2 ]">
                    <a href="{{ route('articals',$articalenglish->url)}}" class="btn btn-primary btn-sm">
                  
                      @if($articalenglish->subcategory_id == null) {{$articalenglish->category->name}}@else{{$articalenglish->categoryName->name ?? null}}@endif

                    </a>
                  </div>
                  <a href="javascript:void(0)">
                   <img src="{{ URL::asset('storage/articals/' . $articalenglish->image) }}" alt="image">
                  </a>
                </div>
              </div>
            </div>
            @endforeach
             
          </div>
            @endif
        </div>
      </div>
    </div>
  </section>


 
  @foreach(App\Models\Banner::with('user')->where('language_id',Session::get('language_id'))->where('status','active')->get() as $banner)
   <div class="col-12 col-lg-6">
      <div class="small-cards-container">
        <div class="post-content urdu [ d-flex justify-content-between flex-column  ]">
          <a href="javascript:void(0)">
            <h4> {{ $banner->title }}</h4>
          </a>
          <div class="post-auth-date [ d-flex ]">
            <ul class="d-flex">
              <li>
                <a href="javascript:;">
                  <i class="fa-solid fa-user"></i>
                  {{ $banner->title }}
                </a>
              </li>
              
            </ul>
          </div>
        </div>

        <div class="post-image">
          <div class="post-tags [ d-flex gap-2 ]">
            <a href="javasript:;" class="btn btn-primary btn-sm">
            {{ $banner->title }}
            </a>
          </div>
          <a href="javascript:void(0)">
             <img src="{{ URL::asset('storage/banners/' . $banner->image) }}" alt="Slider One" />
          </a>
        </div>
      </div>
    </div>
    
    @endforeach

  <section class="post-section">
    <div class="container">
      <div class="ad__cont horizontal">
        <a href="javascript:void(0)">
          <i class="fa-solid fa-ad"></i>
          <picture>
            <!-- <source media="(max-width:650px)" srcset="img_pink_flowers.jpg')}}">
            <source media="(max-width:465px)" srcset="img_white_flower.jpg')}}"> -->
            <img src="{{ URL::asset('storage/add_image/' . $ads01->add_image02) }}" alt="Ad Image">
          </picture>
        </a>
      </div>
    </div>
  </section>

   <section class="post-section read__articals__section video__articals__section text-center mt-5">
    <div class="container">
      <div class="col-12">
        <div class="section-heading [ d-flex align-items-center ]">
          <h2 class="heading-text borderless m-0 font-gilroy-bold text-white fs-1">
            <span class="font-gilroy-bold">Videos Articles</span>
          </h2>
          <a href="{{ route('videodall') }}" class="white-space-nowrap [ btn btn-light border hover-primary ]">
            View All 
            <i class="fa-solid fa-long-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="video__type__card__container">
       
     
      @foreach ($videos as $video)
          
      
      
      <div class="video__type__card">
        <div class="video__type__card__image">
          <img src="{{ asset('storage/vedio_cover/'.$video->vedio_cover) }}" alt="Vidoe Thumbnail" />
        </div>
        <div class="video__type__card__content urdu">
        
         
        <a href="{{ route('video_details',$video->url)}}">
            <i class="fa-solid fa-play"></i>
            <h3>{{$video->title}}</h3>
        </a>
        </div>
      </div>
      
      @endforeach
      
     
      </div>
  </section>
   

@endsection



