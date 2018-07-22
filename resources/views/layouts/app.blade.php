<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script>window.Laravel = { csrfToken: '{{csrf_token() }}'}</script> --}}
    
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/fonts/fonts.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <link href="{{asset('css/home.css')}}" rel="stylesheet"> 
     <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
  </head>

   <body>

    <div id="app">

      @include('layouts.header')

      @yield('content')

      @include('layouts.footer')

      <flash message="{{ session('flash')}}"></flash>

    </div>   {{--!Kaha bata aayo k yo matukney--}}

      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{asset('css/bootstrap/feather.min.js')}}"></script>
      <script>
        feather.replace()   
      </script> 
 
  </body>
</html>