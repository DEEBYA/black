@extends('admin.layouts.adminlayout')

@section('bodypart')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background:rgb(243, 247, 253) ">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
      align-items-center pb-2 mb-3 border-bottom">            
      <div>
        <span data-feather="home"></span>
          <a href="" class="hlw">
            Home
          </a> 
        <span data-feather="chevrons-right"></span>
          Add Slides                 
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
    <p class="card-text mb-0">Total Slider's</p>
      <div class="fluid-container">           
        <h1 class="card-title mb-0 animated  fadeIn" style="color: #f35626;">{{$slideCount}} </h1>      
      </div>  
  </main> 

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" >

  <div class="col-xs-2" >
    <a href="/admin/slider">
    <button type="button" class="btn btn-outline-success">
      Add Slider
      <span data-feather="plus"></span>
    </button></a>      
      <span data-feather="chevrons-right"></span>   
      <strong> Lists of Sliders</strong>
     {{--  <div class="float-right">{{$slides -> links()}}</div> --}}
  </div>
</main> 

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background:rgb(243, 247, 253) ">
    <div class="col-xs-12">
      <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead class="tablecolor">
          <tr>
            <th >S.N</th>
            <th >Title</th>
            <th >Body</th>   
            <th >Image</th>
            <th >Created</th>
            <th >Action</th>
          </tr>
        </thead>

         @foreach($slides as $slide)
          <tbody>
            <tr>
              <th scope="row">{{$slide->id}}</th>
              <td>{{$slide->title}}</td>
              <td>{{substr($slide->body,0,40)}}&nbsp;
                  {{strlen($slide->body) >40 ? "..." : ""}}</td> 
              <td><img src="/storage/slider_img/{{$slide->slider_img}}" style="width: 60px;"></td>
              <td>{{$slide->created_at->diffForHumans()}}</td>
              <td style="display: flex;"><a href="{{action('SlideController@edit', $slide->id)}}">
                <button type="button" class="btn btn-outline-success">
                    <span data-feather="edit"></span>
                    </button>
                  </a> &nbsp; 
                  <form onSubmit="return confirm('Are you sure you wanna delete this.')" 
                    method="POST" action="{{route('slide.destroy', $slide->id)}}">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                    {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                   <button type="submit" class="btn btn-outline-danger"><span data-feather="delete"></span></button>
                   </form> 
              </td>
            </tr>   
          </tbody>
        @endforeach
      </table>
    </div>
        {{-- <div class="float-right">{{$slides -> links()}}</div> --}}
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach( $slides as $slide )
             <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
           @endforeach
          {{-- <li data-target="#myCarousel" data-slide-to="0" class=""></li>
          <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="2" class=""></li> --}}
        </ol>
        <div class="carousel-inner">
        @foreach( $slides as $slide )
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img class="second-slide" src="/storage/slider_img/{{$slide->slider_img}}" alt="Second slide" style="
    width: 1086px;
    margin:  0px auto;
    height: 276px;
">
            <div class="container">
              <div class="carousel-caption">
                <h1>{{$slide->title}}</h1>
                <p>{{$slide->body}}</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          @endforeach
        </div>


        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </main>



@endsection