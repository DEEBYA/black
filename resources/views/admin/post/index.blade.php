@extends('admin.layouts.adminlayout')

@section('bodypart')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background-color: #F5F5F5;">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <div>
                <span data-feather="home"></span>
                  <a href="" class="hlw">
                    Home
                  </a> 
                <span data-feather="chevrons-right"></span>
                    Dashboard                 
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>
      </main>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" >
        <h1 class="animated  bounceInUp" style="color: #f35626; text-align: center;">Welcome {{Auth::user()->name}}</h1><br>
          <div class="row mb-3" style="margin-left:5px;">
            <div class="card bg-light mb-2 mr-2 new">
              <div class="card-header" style="background: #fff;">Total Home Visit</div>
              <div class="card-body" style="background: #fff;">
                <h5 class="card-title"> Visits</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card bg-light mb-2 mr-2 new" >
              <div class="card-header" style="background: #fff;">Header</div>
              <div class="card-body" style="background: #fff;">
                <h5 class="card-title">Light card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card bg-light mb-2 mr-2 new" >
              <div class="card-header" style="background: #fff;">Header</div>
              <div class="card-body" style="background: #fff;">
                <h5 class="card-title">Light card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            <div class="card bg-light mb-2 new" >
              <div class="card-header" style="background: #fff;">Header</div>
              <div class="card-body" style="background: #fff;">
                <h5 class="card-title">Light card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
        </div>

          

      
      
        <div class="row">

           <div class="col-md-3">
              <a href="/admin/add-books">
                <p class="animated-word"><span data-feather="plus"></span>Add Books</p>   
              </a>          
           </div>
           
            <div class="col-md-3">
               <a href="/admin/add-news ">
                  <p class="animated-word2"><span data-feather="plus"></span>Add News</p>              
              </a>  
            </div>                 

            <div class="col-md-3">     
             <a href="/admin/add-quotes">
              <p class="animated-word3"><span data-feather="plus"></span>Add Quotes</p>
              </a>           
            </div>
                 
            <div class="col-md-3">
               <a href=" /admin/slider">
                 <p class="animated-word4"><span data-feather="plus"></span>Add Slider</p>              
              </a>  
            </div>
        </div>
      </main>

      @endsection

  