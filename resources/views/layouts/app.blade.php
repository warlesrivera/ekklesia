<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('assets/libraries/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/libraries/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/fonts.css')}}" media="none" onload="if(media!='all')media='all'">
    <link type="text/css" rel="preload" href="{{asset('assets/libraries/sweetalert2/sweetalert2.min.css')}}" as="style" onload="this.rel='stylesheet'" />

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@yield('style')

<body>
    <div id="app">
        @yield('content')
    </div>

     <!-- Scripts -->
     <script src="{{ asset('assets/libraries/bootstrap/js/jquery-3.5.1.slim.min.js') }}" ></script>
     <script src="{{asset('assets/stylesAdm/vendor/jquery/jquery.min.js')}}"></script>
     <script src="{{ asset('assets/libraries/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
     <script type="text/javascript" src="{{asset("assets/libraries/sweetalert2/sweetalert2.min.js")}}"></script>

     <script src="{{ asset('assets/js/style.js')}}"></script>
     <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid= ra-5de9230971ae6ef0"></script>
     <script src="{{asset('assets/js/helpers.js')}}"></script>

     @stack('scripts')
</body>
</html>
