@extends('layouts.app')

@section('content')
<div class="padd" style="padding: 0px 16px 0px 0px;">
	<div class="row">
  		<div class="col-12 col-md-9">
  			<div class="ml-4">  		

		      	<h1>{{$book->title}}</h1>

		     	<p>By:<a href="">{{$book->aurthors}}</a></p>

		     	<div class="row" >

		     		<div class="col-6 col-md-4">
		     			
			      		<img src="/storage/cover_images/{{$book->book_img}}" 
			      		class="img-fluid img-rounded" alt="Cinque Terre" width="290" 
			      		height="350">		

		     		</div>

		     		<div class="col-12 col-md-8">

		     			{{substr(strip_tags($book->body),0,300)}}&nbsp;
			   			{{strlen($book->body) >300 ? "...READ MORE" : ""}}

			   			<div style="display: flex;">

							@include('layouts.viewbook')

				
								@if(auth()->check())	
									<a href="/storage/pdf_store/{{$book->pdf}}" ><button type="button" class="btn btn-default btn-signin" style="
				    						margin: 0px;padding-left: 21px;right: -23px;">
				    						Download Book
				    					</button>
				    				</a>									
			    				@endif	
		    			</div>
		     		</div>
		     	</div>
		     	<br><br>
		     	<div class="titlt2"></div>
				<h1>Post and Comments</h1>

					@foreach($book->replies as $reply)
						@include('layouts.bookcomments')
					@endforeach

						{{-- {{ $replies -> links() }}  --}}

					@if(auth()->check())	
						<div class="row">
							<div class="col-md-12 col-md-offset-2">
							 	<form method="POST" action="{{$book->path() . '/replies' }}">			 
							 	{{csrf_field()}}	
							        <div class="form-group">
								        <textarea class="form-control" id="comment" name="body" placeholder="Have Something to say..." rows="3" ></textarea>				       
							        </div> 
							         <button type="submit" class="btn btn-default btn-signin resp"
							          style="margin: 0px 0px !important;">Post</button>		 		
							 	</form>
							 	@include('includes.error')
							</div>
						</div>
						@else
							<h5 style="text-align: center;">
								Please, <a href="/login" style="color: #039be5;">Sign in</a> to participate.
							</h5>
					@endif
					<br>	
  			</div>  	
  		</div>

	  	<div class="col-12 col-md-3 " >
	  		<div class="mr-3">	 
	  			<p class="border border-info">	  				
	  		 		This book was published {{$book->created_at->diffForHumans()}}by
	  		 		<a href="#">{{$book->creator->name}}</a>, and currently 
	  		 		has {{$book->replies_count}} 
	  		 		{{str_plural('comment', $book->replies_count)}}.		
	  			</p>
	  			{{-- <subscribe-button :active="{{ json_encode($book->isSubscribedTo) }}"></subscribe-button> --}}

	  			<h2 style="border-bottom: 6px double #e5e5e5;">Book Option</h2>
	  			<h1>Some thing here</h1>
	  		</div>
	  	</div>
	</div>
	</div>
	<div class="timeline">

@endsection