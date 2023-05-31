@include('admin.layouts.css')
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
@include('admin.layouts.navbar')
      
<!-- MAIN CONTENT-->
    <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">     
                @yield('container')
            </div>
        </div>
    </div>


@include('admin.layouts.js')

