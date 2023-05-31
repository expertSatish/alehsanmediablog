<header class="main-header desktop-header">

    @if (session()->has('success'))
    <div class="alert alert-success test" id="successMessage">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->get('error'))
    <div class="alert alert-danger alert-dismissible" id="successMessage">
        <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong> {{ session()->get('error') }}
    </div>
    @endif

    <!-- top strip starts -->
    <div class="top-strip-container [ d-flex align-items-center ]">
        <div class="container">
            <div class="top-sub-strip [ d-flex justify-content-end align-items-center gap-x-4 ]">
                <div class="top-logo">
                    <a href="/">
                        <img src="{{asset('frontend/assets/img/top-logo.svg')}}" alt="Top Header Logo" />
                    </a>
                </div>

                <a href="https://pages.razorpay.com/AlehsanMedia" target="_blank"
                    class="btn btn-secondary d-flex gap-x-2 align-items-center">
                    Donate Now
                    <i class="fa-solid fa-circle-dollar-to-slot"></i>
                </a>

                <ul class="menu [ d-flex align-items-center ] ">
                    <li class="menu-item hidden-md">
                        <a href="{{ route('aboutusdd') }}" class="menu-link">
                            <i class="fa-solid fa-circle-question"></i>
                            <span>About Us</span>
                        </a>
                    </li>
                    <li class="menu-item hidden-md">
                        <a href="{{ url('contact') }}" class="menu-link">
                            <i class="fa-solid fa-envelope"></i>
                            <span>Contact Us</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('authorlist')}}" class="menu-link">
                            <i class="fa-solid fa-user-pen"></i>
                            <span>Authors</span>
                        </a>
                    </li>
                    @guest

                    <li class="nav-item">
                        @if (Route::has('login'))
                        {{-- <a class="nav-link" href="{{ url('singin') }}">{{ __('Login') }}</a> --}}
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif /
                        @if (Route::has('register'))
                        {{-- <a class="nav-link" href="{{ url('singup') }}">{{ __('Register') }}</a> --}}
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                    @else
                    <li><a href="{{url('login')}}">{{ Auth::user()->name }}</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
    <!-- top strip ends -->

    <!-- top navigation starts -->
    <div class="top-nav-container [ d-flex align-items-center ] ">
        <div class="container">
            <div class="top-nav-sub-container [ d-flex align-items-center justify-content-end gap-x-4 ] ">
                <ul class="menu">
                    <li class="menu-item hidden-md hidden-lg hidden-xl">
                        <a href="/" class="menu-link">Home</a>
                    </li>
                    <li class="menu-item hidden-md hidden-lg hidden-xl">
                        <a href="/" class="menu-link">Personalities</a>
                    </li>
                    @php
                    $categoriesd = App\Models\Category::where('parent_id',0)->with('subcategories')->get();
                    @endphp
                    @foreach ($categoriesd as $categorie)
                    <li class="menu-item bg-sec {{($categorie->subCategories->isEmpty()) ? '' : 'menu-item-has-children'}}">
                        <a href="@if($categorie->subCategories->isEmpty()){{ route('categoryalllist', $categorie->url) }}@endif"
                            class="menu-link">{{ $categorie->name }}</a>

                        <ul class="sub-menu" >
                           
                            <li class="menu-item">
                                <div class="container" >
                                    <div class="row  bg-white overflow-hidden">
                                    @foreach ($categorie->subCategories as $subcategor)
                                        
                                        <div class="col-sm-6" >
                                            <a
                                                href="{{ route('categoory',["slug"=>$categorie->url, "subcategory"=>$subcategor->url]) }}">{{$subcategor->name}}</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            

                        </ul>

                    </li>
                    @endforeach

                    <li class="menu-item menu-item-has-children">
                        <a href="#" class="menu-link">
                            Articles
                        </a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="{{ route('urduartical') }}">Urdu Articles</a></li>
                            <li class="menu-item"><a href="{{ route('arbicartical') }}">Arabic Articles</a></li>
                            <li class="menu-item"><a href="{{ route('englishartical') }}">English Articles</a></li>
                            <li class="menu-item"><a href="{{ route('hindihartical') }}">Hindi Articles</a></li>
                        </ul>
                    </li>

                    <li class="menu-item"><a href="{{ route('bookall') }}">Books & Magazines </a></li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{{ url('#') }}" class="menu-link">Gallery</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="{{ route('albumGallery') }}">Images</a></li>
                            <li class="menu-item"><a href="{{ route('videodall') }}">Videos</a></li>

                        </ul>
                    </li>

                    <li class="menu-item menu-item-has-children hamburger-menu hidden-xxl">
                        <span><i class="fa-solid fa-bars"></i></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="./" class="menu-link">Home</a>
                            </li>
                            <li class="menu-item hidden-xl hidden-lg">
                                <a href="#" class="menu-link">literatures</a>
                            </li>
                            <li class="menu-item hidden-xl">
                                <a href="#" class="menu-link">
                                    sufiyana kalam
                                </a>
                            </li>


                            <li class="breaker">
                                <hr />
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('authorlist') }}" class="menu-link">Authors</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('aboutusdd') }}" class="menu-link">About Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('contact') }}" class="menu-link">Contact Us</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="search-bar-container">
                    <div class="search-button">
                        <i class="fa-solid fa-search pe-none"></i>
                    </div>
                    <div class="search-input-container">
                        <form action="">
                            <i class="fa-solid fa-search"></i>
                            <input type="text" placeholder="What are you looking for..." class="form-control"
                                id="search-box" name="search-box" />
                            <i class="fa-solid fa-times close"></i>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top navigation ends -->
</header>

<!-- Mobile Menus -->
<header class="mobile-header d-md-none">
    <div class="top-logo">
        <a href="/">
            <img src="{{asset('frontend/assets/img/top-logo.svg')}}" alt="Top Header Logo" />
        </a>
    </div>
    <div class="mobile-header-ctas d-flex align-items-center">
        <a href="https://pages.razorpay.com/AlehsanMedia" target="blank"
            class="btn btn-secondary d-flex gap-x-2 align-items-center white-space-nowrap">
            Donate Now
        </a>
        <button type="button" class="mobile__hamburger"><i class="pe-none fa-solid fa-bars"></i></button>
    </div>
    <div class="mobile-menus-container" style="display: none;">
        <div class="align-items-center d-flex justify-content-between w-100">
            @guest
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="btn btn-secondary d-flex gap-x-2 align-items-center">
                Login/Join
                <i class="fa-solid fa-circle-dollar-to-slot"></i>
            </a>
            @endif

            @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}"
                class="btn btn-secondary d-flex gap-x-2 align-items-center">{{ __('Register') }} <i
                    class="fa-solid fa-circle-dollar-to-slot"></i></a>

            @endif

            @else
            <a href="{{url('login')}}"
                class="btn btn-secondary d-flex gap-x-2 align-items-center">{{ Auth::user()->name }} <i
                    class="fa-solid fa-circle-dollar-to-slot"></i></a>
            @endguest

            <div class="close-button"><i class="pe-none fa-solid fa-times"></i></div>
        </div>
        <ul class="menu mt-3">
            <li class="menu-item">
                <a href="./" class="menu-link">Home</a>
            </li>


            @php
            $categoriesd = App\Models\Category::where('parent_id',0)->with('subcategories')->get();
            @endphp
            @foreach ($categoriesd as $categorie)
            <li class="menu-item menu-item menu-item-has-children">
                <a href="{{ route('categoryalllist', $categorie->url) }}" class="menu-link">{{ $categorie->name }}</a>
                @if(!$categorie->subCategories->isEmpty())
                <div class="dropdown-icon"><i class="pe-none fa-solid fa-angle-down"></i></div>
                @endif

                <ul class="sub-menu">
                    @foreach ($categorie->subCategories as $subcategor)
                    <li class="menu-item"><a
                            href="{{ route('categoory',["slug"=>$categorie->url, "subcategory"=>$subcategor->url]) }}">{{$subcategor->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach

            <li class="menu-item"><a href="{{ route('bookall') }}">Books & Magazines </a></li>
            <li class="menu-item"><a href="{{ route('videodall') }}">Videos</a></li>

            <li class="menu-item menu-item-has-children">
                <a href="#" class="menu-link">
                    Articles
                </a>
                <div class="dropdown-icon"><i class="pe-none fa-solid fa-angle-down"></i></div>
                <ul class="sub-menu">
                    <li class="menu-item"><a href="{{ route('urduartical') }}">Urdu Articles</a></li>
                    <li class="menu-item"><a href="{{ route('arbicartical') }}">Arabic Articles</a></li>
                    <li class="menu-item"><a href="{{ route('englishartical') }}">English Articles</a></li>
                    <li class="menu-item"><a href="{{ route('hindihartical') }}">Hindi Articles</a></li>
                </ul>
            </li>


        </ul>

        <ul class="menu mt-3">
            <li class="menu-item">
                <a href="{{ route('authorlist') }}" class="menu-link">Authors</a>
            </li>
            <li class="menu-item">
                <a href="{{ route('aboutusdd') }}" class="menu-link">About Us</a>
            </li>
            <li class="menu-item">
                <a href="{{ url('contact') }}" class="menu-link">Contact Us</a>
            </li>

        </ul>


    </div>
</header>