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

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
@yield('style')

<body>
    <div id="app">
        @yield('content')
    </div>

     <!-- Scripts -->
     <script src="{{ asset('assets/libraries/bootstrap/js/jquery-3.5.1.slim.min.js') }}" ></script>
     <script src="{{ asset('assets/libraries/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
     <script src="{{ asset('assets/js/style.js')}}"></script>
@yield('script')

</body>
</html>
