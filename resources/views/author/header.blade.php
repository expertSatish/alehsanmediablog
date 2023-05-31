<!-- fixed-top-->
<div class="row d-none">
    <!-- success message open -->


    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
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

    <!-- success message close -->
</div>

<div id='cssmenu'>
    <ul class="pt-0">
        <li><a href="{{ url('/') }}"> <i class="fa-solid fa-gauge"></i> Go To Website</a></li>
        <li><a href="{{ url('author/dashboard') }}"> <i class="fa-solid fa-gauge"></i> Dashboard</a></li>
        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Manage Articles</a>
            <ul>
                <li class=''><a href="{{ route('manage-artical.index') }}">Articles List </a> </li>
            </ul>
        </li>



        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>मैनेज आर्टिकल्स </a>
            <ul>
                <li class=''><a href="{{ route('manage-artical-hindi.index') }}">आर्टिकल्स लिस्ट </a> </li>
            </ul>
        </li>

        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>مضامین کی ترتیب</a>
            <ul>
                <li class=''><a href="{{ route('manage-artical-urdu.index') }}">مضامین کی فہرست </a> </li>
            </ul>
        </li>

        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>إدارة المضامین</a>
            <ul>
                <li class=''><a href="{{ route('manage-artical-arabic.index') }}">إدارة المضامین</a> </li>
            </ul>
        </li>



        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Manage Videos</a>
            <ul>
                <li class=''><a href="{{ route('manage-video.index') }}">Videos List</a> </li>
            </ul>
        </li>

        <li><a href='#'>
                <i class="fa-brands fa-blogger"></i>Manage Books</a>
            <ul>
                <li class=''><a href="{{ route('manage-book.index') }}">Book List</a> </li>
            </ul>
        </li>

    </ul>
</div>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <a href="{{ url('/') }}" target="blank"> <i class="fa-solid fa-gauge"></i> Go To Website</a>

    <a href="{{ url('author/dashboard') }}"> <i class="fa-solid fa-gauge"></i> Dashboard</a>

    <button class="dropdown-btn"> <i class="fa-brands fa-blogger"></i>Manage Articles
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
     <a href="{{ route('manage-artical.index') }}">Articles List </a>
    </div>
    <button class="dropdown-btn"><i class="fa-brands fa-blogger"></i>मैनेज  आर्टिकल्स 
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
     <a href="{{ route('manage-artical-hindi.index') }}">आर्टिकल्स लिस्ट </a>
    </div>

     <button class="dropdown-btn"> <i class="fa-brands fa-blogger"></i>مضامین کی ترتیب
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
     <a href="{{ route('manage-artical-hindi.index') }}">مضامین کی فہرست </a>
    </div>
     <button class="dropdown-btn"> <i class="fa-brands fa-blogger"></i>دارة المضامین
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
    <a href="{{ route('manage-artical-arabic.index') }}"> إدارة المضامین  </a>
    </div>

     <button class="dropdown-btn"> <i class="fa-brands fa-blogger"></i>Manage Videos
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
    <a href="{{ route('manage-video.index') }}">Videos List</a>
    </div>
     <button class="dropdown-btn"> <i class="fa-brands fa-blogger"></i>Manage Books
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
    <a href="{{ route('manage-book.index') }}">Book List</a>
    </div>
    





</div>
