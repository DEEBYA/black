

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
            <img class="second-slide" src="/storage/slider_img/{{$slide->slider_img}}" alt="Second slide">
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
