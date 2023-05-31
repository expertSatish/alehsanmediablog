<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Krishna Chikan">
    <meta name="keywords" content="Krishna Chikan">
    <meta name="author" content="Webmingo">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Author Dashboard</title>
    <!--  <title>Krishna Chikan | @yield('title')</title> -->
  
    
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- END VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/datatable.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.4/sweetalert2.min.css" >
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/style.css') }}">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

  <style>
           @media (max-width: 768px) {
            .phonetoglett {
                text-align: right;
                display:block !important;
            }
            div#cssmenu{
                   display:none;
            }
            .admin-logo img {
              height: 72px;
              width: 96px;
          }
          .admin-logo {
          text-align: center!important;
          margin-left: 37px;
          /* width: 143px; */
         }
        }
           @media (min-width: 768px) {
            .phonetoglett {
             display:none;
            }
        }
    </style>
<style>
 
div#artical-modal {
    overflow-x: hidden;
    overflow-y: auto;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

/* Style the sidenav links and the dropdown button */
.sidenav i, .dropdown-btn {
  padding: 6px 18px 6px 6px;
}

.sidenav a, .dropdown-btn {
  padding: 13px 8px 6px 16px;
  text-decoration: none;
  font-size: 22px;
  color: #ddd;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
 /*background-color: green;*/
  color: green; 
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: -234px;
    font-size: 46px;
    margin-left: 50px;
    margin-top: -14px;
}
 
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
    

</head>
<body>
    

<div class="top-header-sec py-1 bg-light border-bottom mb-2">
  <div class="container-fluid">
      <div class="top-main-header d-flex align-items-center">
       <div class="btn-group">
        <span class="phonetoglett" style="font-size:45px;cursor:pointer" onclick="openNav()">&#9776;</span>
         </div>
          <div class="admin-logo">
            <img src="{{asset('frontend/assets/img/top-logo.svg')}}">  
          </div>
          <div class="ml-auto">
                   <div class="btn-group">
            <button class="btn  bg-transparent p-0 dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-light fa-circle-user"></i> Author
            </button>
            <div class="dropdown-menu keep-open header-dropdown">
                <a class="dropdown-item" href="{{url('author/profile-setting')}}"><i class="fa-light fa-user"></i> Profile </a>
                <a class="dropdown-item" href="{{url('author/logout')}}"><i class="fa-light fa-power-off"></i> Logout</a>
            </div>
        </div>
      </div>
  </div>
</div>
</div>


<script type="text/javascript">
    jQuery('.dropdown-menu.keep-open').on('click', function (e) {
  e.stopPropagation();
});

if(1) {
  $('body').attr('tabindex', '0');
}
else {
  alertify.confirm().set({'reverseButtons': true});
  alertify.prompt().set({'reverseButtons': true});
}
</script>