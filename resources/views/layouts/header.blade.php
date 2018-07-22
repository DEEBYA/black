  <nav class="navbar navbar-expand-md navbar-light {{-- navbar-laravel --}} collapsed">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">                     
                      <img src="{{asset('images/Logo.png')}}" style="width: 127px; height:72px;" title="Abhibyakthi">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">      
                        <li><a class="nav-link" href="/">Home</a></li>  
                        <li><a class="nav-link" href="/books">Books</a></li>    
                        <li><a class="nav-link" href="/news">News </a></li>    
                        {{-- <li><a class="nav-link" href="#">Musics</a></li> --}}
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" >or</a></li>
                            <li><a class="nav-link btn btn-static-primary " href="{{ route('register') }}" style="margin-top: 3px; color: white;">Sign Up</a></li>

                        @else
                                @if(auth()->check()) 
                                    <a href="/create" style="text-decoration: none;">
                                        <button class="btn btn-outline-primary"  
                                            role="button" style="display: flex;">
                                            <span data-feather="book-open" class="mr-2"></span>
                                                Create New Book
                                        </button>
                                    </a>
                                
                                @endif

                            {{-- <user-notifications></user-notifications>  --}}
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: relative;padding-left: 50px;">
                                    <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:39px;height: 36px;position: absolute;top: 3px; left: 4px; border-radius: 50%;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="margin: 0px;">
                                                     <span data-feather="log-out"></span>
                                        Logout
                                    </a>                                 

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="{{ route('profile', Auth::user()) }}" class="dropdown-item" 
                                        style="margin: 0px;">
                                        <span data-feather="user"></span>
                                            My Profile
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
