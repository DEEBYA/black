<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Admin</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->  
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}"" rel="stylesheet">
  </head>

  <body>
    <div class="app">
      
          {{-- Navigation Part --}}
          {{-- @include('admin.layouts.nav')         --}}

          {{-- Body Parts --}}
          @include('admin.post.index')   



        {{-- Footer part --}}
          @include('admin.layouts.footer')
          <flash message="{{ session('flash')}}"></flash>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
  
</html>
