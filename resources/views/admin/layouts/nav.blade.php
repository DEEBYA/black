 <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 bgf">

      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"> Abhibyakti</a>
      
      <ul class="navbar-nav px-3">      

            <li class="nav-item text-nowrap">
      
                <a href="{{ url('admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">

                    {{ csrf_field() }}
                </form>

            </li>

        </ul>
        
    </nav>         

    <div class="container-fluid"> 
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky"  >
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="/admin">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a> 
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/view-users">
                   <span data-feather="users"></span>
                  Manage Users
                </a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="/admin/view-admins">
                   <span data-feather="user"></span>
                  Manage Admins
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/view-books">
                  <span data-feather="book"></span>
                  Manage Books
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/admin/category">
                  <span data-feather="zap"></span>                 
                  Category
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/admin/view-news">
                  <span data-feather="tv"></span>
                 
                  News &amp; Events
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="/admin/quotes">
                  <span data-feather="feather"></span>
                  Manage Quotes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/view-slide">
                  <span data-feather="airplay"></span>
                  Manage Sliders
                </a>
              </li>
            </ul>           
           
          </div>
        </nav>
      </div>
    </div>
