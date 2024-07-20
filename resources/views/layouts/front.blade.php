<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>
        @yield('title')
    </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">  

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="{{ asset('admin/fonts/fontawesome/css/fontawesome-all.css') }}" crossorigin="anonymous">
    
    <!--Theme color-->
    <link id="switcher" href="{{ asset('frontend/css/theme-color/default-theme.css') }}" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">    
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet">    
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" />

    <!-- OWl Carousel -->
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.theme.default.min.css.') }}" rel="stylesheet" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
          
</head>
<body>
        <!--START SCROLL TOP BUTTON -->
        <a class="scrollToTop" href="#">
        <i class="fa fa-angle-up"></i>
        </a>
        <!-- END SCROLL TOP BUTTON -->

        @include('layouts.include.frontnavbar')
        
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- scripts-->
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
        <script src="{{ asset('frontend/js/custom.js')}}"></script>
        
        <script src="{{ asset('frontend/js/jquery-3.7.1.min.js')}}"></script>      
        <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
                
        <!-- Sweet Alert JS -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if(session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
        @endif
        
        @yield('scripts')
        
</body>
</html>
