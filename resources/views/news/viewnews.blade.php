@extends('layouts.app')

@section('content')
	<div class="container">

		<h1 class="animation" style="text-align: center;">Featured stories</h1>		
    <h3 class="animation mb-5" style="text-align: center;">For you</h3>
    
        <div class="row">     
        		<div class="col-md-8">  
            @foreach($news as $new)   
        			<div class="row">

          			<div class="col-md-8" class="rem_decoration">
          				Based on&nbsp;{{$new->topic}}
                  <a href="/news/{{$new->id}}" style="text-decoration: none;">
            		  	<h2 class="blog-post-title" style="color:#263238">
                      @if(auth()->check() && $new->hasUpdatesFor(auth()->user()))
                       <strong>
                         {{$new->title}}
                       </strong>
                       @else
                        {{$new->title}}
                        @endif  
                    </h2>
                  </a>
            			<p style="color: gray;">{{substr($new->body,0,110)}}
                    {{strlen($new->body) >110 ? "..." : ""}}
                  </p>
            			<strong>{{$new->aurthors}}</strong>
            			<p class="blog-post-meta" style="font-size: 14px;color: #9e9e9e;">
                    {{$new->created_at->diffForHumans()}}&nbsp;.&nbsp;{{$new->minimum}}&nbsp;min read </p>   
          			</div><!-- /.blog-post -->              
            
          			<div class="col-md-2 ">
          				<img src="/storage/news_images/{{$new->news_img}}" 
                  style="width: 220px; height: 145px;">          			
          			</div>

          		</div>  <!-- row-->

            <br>
          @endforeach
       			 </div><!-- Col-md-8 -->      
              <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="Panel-heading" style="border-bottom: 6px double rgb(229, 229, 229); font-weight: 30px;">Popular News</div>
                  <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
               

                  <div class="p-3">
                    <h4 class="font-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                      @foreach($archives as $stats)
                      <li>
                        <a href="/news?month={{$stats['month']}}&year={{$stats['year'] }}">

                          {{$stats['month'] .' ' . $stats['year']}}

                        </a>
                      </li>
                      @endforeach                      
                    </ol>
                  </div> 
                </div>    
              </div> 
        
          </div><!-- /.row -->	
	
	</div>{{-- End of Container--}}


@endsection
