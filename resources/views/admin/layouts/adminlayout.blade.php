<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{csrf_token() }}'}</script>
    <script src="{{asset('js/dropzone.js')}}"></script>
    <title>Admin</title>

    <!-- Bootstrap core CSS -->  
    <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    

    <!-- Custom styles for this template -->
    <link href="{{asset('css/Animation/animate.css')}}"" rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}"" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/wysiwyg.css')}}">
  </head>

  <body style="background:rgb(243, 247, 253) ">
    <div id="app">
      
        {{-- Navigation Part --}}
        @include('admin.layouts.nav')        

        {{-- Body Parts --}}
        {{-- @include('admin.post.index')    --}}
        @yield('bodypart')
             {{-- @include('admin.post.managebooks') --}}

        {{-- Footer part --}} 
          {{-- @include('admin.layouts.footer') --}}
        
             
        <flash message="{{ session('flash')}}"></flash>
        
    </div>
   

        <script src="{{asset('css/bootstrap/feather.min.js')}}"></script>
        <script>feather.replace()</script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{asset('js/fileupload.js')}}"></script>

  </body>  
</html>