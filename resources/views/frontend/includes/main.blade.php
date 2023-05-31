<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Al Ehsan Media</title>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"  />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"  />


  <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  @livewireStyles
</head>

<body>
    @include('frontend.includes.header')
    
    @yield('content')

    @include('frontend.includes.footer')

    @yield('script_code')

    @livewireScripts
</body>
</html>

