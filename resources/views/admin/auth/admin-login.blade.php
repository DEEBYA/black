@extends('admin.layouts.app')

@section('first')


<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class="hidden-xs col-sm-7 col-md-8">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container">   
                      <img class="" >
                        <div class="copy animated fadeIn">
                            <h1>Abhibyakthi</h1>
                            <p>Welcome to Abhibyakthi.</p>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

            <div class="login-container">

                <p>Sign In Below:</p>

                <form method="POST" action="{{ route('admin.login.submit') }}">
                   @csrf
                    <div class="form-group form-group-default" id="emailGroup">
                        <label>E-mail</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" value="" placeholder="E-mail" class="form-control" required>
                         </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>Password</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                    </div>
{{-- 
                     <div class="form-group form-group-default">
                        <div class="g-recaptcha" data-sitekey="6LckrF8UAAAAAJ2pKz8Cp9uLQCFcYPuy8cNW39GZ"></div>
                     </div> --}}
                     
                    <button type="submit" class="btn btn-block login-button">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> Logging in...</span>
                        <span class="signin">Login</span>
                    </button>

                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                    Forgot Your Password?
                                </a>

              </form>

              <div style="clear:both"></div>

              
            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->

@endsection