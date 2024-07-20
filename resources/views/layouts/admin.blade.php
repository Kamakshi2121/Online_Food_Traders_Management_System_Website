<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/fonts/fontawesome/css/fontawesome-all.css') }}" crossorigin="anonymous">

    <!-- CSS Files -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" />
</head>
<body>

<div class="wrapper ">
        @include('layouts.include.sidebar')

        <div class="main-panel" id="main-panel">
        @include('layouts.include.adminnavbar')

        <div class="content-wrapper">
            @yield('content')
        </div>
        
        @include('layouts.include.adminfooter')

        </div>
</div>
    <!-- scripts-->
        
        <script src="{{ asset('admin/js/jquery.min.js') }}" defer></script>
        <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
        <script src="{{ asset('admin/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js') }}" defer></script>
        
        <!-- Chart JS -->
        <script src="{{ asset('admin/js/chartjs.min.js') }}" defer></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('admin/js/bootstrap-notify.js') }}" defer></script>
        
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
