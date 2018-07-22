<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <head>

      <!-- SITE TITTLE -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Home</title>
      
 <!--===============================================================================================--> 
  {{-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> --}}
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
   <link href="{{asset('css/login.css')}}" rel="stylesheet">

    {{-- <script src='https://www.google.com/recaptcha/api.js'></script> --}} 

    </head>
  <body class="text-center">

    <nav class="navbar navbar-expand-md navbar-light {{-- navbar-laravel --}} collapsed">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">                     
              <img src="{{asset('images/Logo.png')}}" 
              style="width: 127px; height:72px;" title="Abhibyakthi">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->

                      <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->
                     
                  <li class="nav-link">Not yet registered?</li>
                  <li><a class="nav-link" >or</a></li>
                  <li> <a class="btn btn-static-primary btn-small m-l" 
                          href="{{ route('register') }}">Create an Account
                          <i class='  fa fa-arrow-right'></i>
                      </a>
                  </li>
              </ul>
          </div>
        </div>
      </nav>

    <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
        <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
          <span class="login100-form-title p-b-32">
            Account Login
          </span>

          <span class="txt1 p-b-11">
            email
          </span>
          <div class="wrap-input100 validate-input m-b-36 {{ $errors->has('email') ? ' has-error' : ''  }}" data-validate = "Username is required">
            <input class="input100" type="text" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="help-block">
                 <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <span class="focus-input100"></span>
          </div>
          
          <span class="txt1 p-b-11">
            Password
          </span>
          <div class="wrap-input100 validate-input m-b-12{{ $errors->has('password') ? ' has-error' : '' }}" data-validate = "Password is required">
            <span class="btn-show-pass">
              <i class="fa fa-eye"></i>
            </span>
            <input class="input100" type="password" name="password" >
             @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <span class="focus-input100"></span>
          </div>
          
          <div class="flex-sb-m w-full p-b-48">
            <div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="label-checkbox100" for="ckb1">
                Remember me
              </label>
            </div>

            <div>
              <a href="{{ route('password.request') }}" class="txt3">
                Forgot Password?
              </a>
            </div>
          </div>


    {{--     <div class="form-group">
          <div class="g-recaptcha" data-sitekey="6LckrF8UAAAAAJ2pKz8Cp9uLQCFcYPuy8cNW39GZ"></div> 
        </div> --}}



          <div class="container-login100-form-btn">
            <button class="btn btn-default btn-signin" type="submit" style="margin: 0px 0px;">
              Login
            </button>
          </div>

        </form>
         <P class="mu-2">
            Don't have an account? 
            <a class="align-middle" href="{{ route('register') }}" 
              style="color:#00aeff; text-decoration:#2196f3 wavy underline;">
              <strong>Get Started</strong>
            </a>
          </P>
          
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
  <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('js/main.js')}}"></script>

</body>
</html>

