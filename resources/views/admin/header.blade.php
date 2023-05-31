<!-- fixed-top-->
<div class="row d-none">
    <!-- success message open -->
    <div class="col-10">
        @if (session()->get('success'))
            <div class="alert alert-info alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        @endif

        @if (session()->get('error'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ session()->get('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- success message close -->
</div>

<div id='cssmenu'>
    <ul class="pt-0">
        <li><a href="{{ url('/') }}" target="blank"> <i class="fa-solid fa-gauge"></i> Go To Website</a></li>
        <li><a href="{{ url('admin/dashboard') }}"> <i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        <li><a href='#'> <i class="fa-solid fa-gear"></i>Home Page Setting</a>
            <ul>

                <li><a href="{{ route('admin.manage-abouts.index') }}">About Us</a></li>
                <li><a href="{{ route('admin.manage-terms.index') }}">Terms & Conditions</a></li>
                <li><a href="{{ route('admin.manage-policy.index') }}">Privacy Policy</a></li>



            </ul>
        </li>




        {{-- <li><a href='#'>
            <i class="fa-brands fa-blogger"></i>Blogs</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-blog.index') }}">Blog</a> </li>
                <li class=''><a href="{{ route('admin.manage-blog-category.index') }}">Category</a> </li>
            </ul>
        </li> --}}
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Manage Articles</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-artical.index') }}">Articles List </a> </li>
                <li class=''><a href="{{ route('admin.manage-artical-drops.index') }}">Drops Artical </a> </li>

            </ul>
        </li>

        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Languages</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-language.index') }}">Language List</a></li>
            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Banners</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-banner.index') }}">Banner List</a></li>
            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Category</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-category.index') }}">Category List</a></li>
            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Sub Category</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-sub-category.index') }}">Sub Category List</a></li>
            </ul>
        </li>
        
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Books</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-book.index') }}">Book List</a></li>
                <li class=''><a href="{{ route('admin.manage-book-drops.index') }}">Book Drops List</a></li>


            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Gallery Images</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-gallery.index') }}">Gallery List</a></li>
            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Album</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-album.index') }}">Album List</a></li>
            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Manage Ads</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-add.index') }}">Ads List</a></li>
            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Manage Personality</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-personality.index') }}">Personality List</a></li>
            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Video</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-video.index') }}">video List</a></li>
            </ul>
        </li>


        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Manage Authors</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-authors.index') }}">Author List</a></li>
            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Contacts</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-contact.index') }}">Contact List</a></li>
            </ul>
        </li>

        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Subscribe</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-subscribe.index') }}">Subscribe List</a></li>
            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Comments</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-comments.index') }}">Comments List</a></li>
            </ul>
        </li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Vdeo Comments</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-video-comments.index') }}">Comments List</a></li>
            </ul>
        </li>

        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Book Comment</a>
            <ul>
                <li class=''><a href="{{ route('admin.manage-book-comments.index') }}">Comments List</a></li>
            </ul>
        </li>





    </ul>
</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <a href="{{ url('/') }}" target="blank"> <i class="fa-solid fa-gauge"></i> Go To Website</a>

    <a href="{{ url('admin/dashboard') }}"> <i class="fa-solid fa-gauge"></i> Dashboard</a>
    <button class="dropdown-btn"> <i class="fa-solid fa-gear"></i>Home Page Setting
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-abouts.index') }}">About Us</a>
        <a href="{{ route('admin.manage-terms.index') }}">Terms & Conditions</a>
        <a href="{{ route('admin.manage-policy.index') }}">Privacy Policy</a>
    </div>

    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Manage Articles
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-artical.index') }}">Articles List </a>
        <a href="{{ route('admin.manage-artical-drops.index') }}">Drops Artical </a>
    </div>

    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Languages
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-language.index') }}">Language List</a>

    </div>

    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Banners
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-banner.index') }}">Banner List</a>

    </div>

    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Category
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-category.index') }}">Category List</a>

    </div>
     <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Sub Category
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-sub-category.index') }}">Sub Category List</a>
    </div>

    

    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Books
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-book.index') }}">Book List</a>
        <a href="{{ route('admin.manage-book-drops.index') }}">Book Drops List</a>

    </div>
    

    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Video
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-video.index') }}">video List</a>
    </div>

    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Manage Authors
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-authors.index') }}">Author List</a>
    </div>

    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Contacts
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-contact.index') }}">Contact List</a>
    </div>

    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Subscribe
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-contact.index') }}">Subscribe List</a>
    </div>

    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Comments
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-comments.index') }}">Comments List</a>
    </div>


     <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Vdeo Comments
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-video-comments.index') }}">Comments List</a>
    </div>

    
    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>Book Comment
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="{{ route('admin.manage-book-comments.index') }}">Comments List</a>
    </div>

</div>
