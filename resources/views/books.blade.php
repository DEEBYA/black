@extends('layouts.app')

@section('content')

	<div class="container">
		<h1 >Books</h1>
			<hr style="border-top: 3px double #8c8b8b;">
			<p>Here you can find free books in the category: Letters. Read online or download Letters eBooks for free. Browse through our eBooks while discovering great authors and exciting books.</p>
		
		<div class="btn-group">
		  <button type="button" class="btn btn-info dropdown-toggle scale-button" 
		    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-image: linear-gradient(to right, #ffc600, #f66);">
		    Categories
		  </button>
		    <div class="dropdown-menu">
			    
			     @foreach(App\Channel::all() as $channel)
			    	<a class="dropdown-item" href="/books/{{$channel->slug}}">{{$channel->name}}</a>	    	
			    @endforeach
			 {{--    <div class="dropdown-divider"></div>
			    <a class="dropdown-item" href="#">Medical</a> --}}
			</div>{{--droupmenu --}}
		</div>{{--btn-group end --}}<br><br>


{{-- Screw to this search --}}
		{{-- <div class="form-group ">
			<form action="/books/search" method="GET">
				@csrf
				<input type="text" name="q" placeholder="Search for something" class="form-control">
				<button type="submit" name="submit">sd</button>
			</form>
		</div> --}}


		@if(auth()->check())
			<div class="dropdown">
			  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Browse
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			    <a class="dropdown-item" href="/books">All Books</a>
			    <a class="dropdown-item" href="/books?by={{auth()->user()->name}}">My Books</a>
			    <a class="dropdown-item" href="/books?popular=1">Popular Boooks</a>
			    {{-- <a class="dropdown-item" href="/books?unanswered=1">Unanswered Boooks</a> --}}
			  </div>
			</div>
		@endif
		
		<br class="clear">
		
		<hr style="	height: 10px;border: 0;box-shadow: 0 10px 10px -10px #8c8b8b inset;">
		{{-- Books show Start --}}
<div class="container">

		@forelse($books as $book)
		
			<div class="row">
				  <div class="col-2"><a href="{{ $book->path() }}"><img src="/storage/cover_images/{{$book->book_img}}" style="width: 159px;"></a></div>
				  <div class="col-10">

				  	<p>Author: {{$book->aurthors}}</p>
				  	
				  	<a href=""><p>Book&nbsp;:&nbsp;

				  		<a href="{{ $book->path() }}" style="text-decoration: none; color: #64dd17;">

				  			@if(auth()->check() && $book->hasUpdatesFor(auth()->user()))
					  		 	<strong style="color: #263238 ;">
					  		 		
					  				{{$book->title}}	

					  		 	</strong >

				  			@else
					  			<strong>		

						  			{{$book->title}}
						  			
					  			</strong>

				  			@endif	
				  		</a></p>

				  	</a>	
 
				  	<p>English&nbsp;|&nbsp;Ages:{{$book->ages}}+ &nbsp;|&nbsp; {{$book->replies_count}} {{str_plural('reply',$book->replies_count)}} | {{$book->visits}} Visits | 

				  		@can('update','book')
				  			<a  href="{{ $book->paths() }}">
				  				{{-- <button type="button" class="btn btn-link"> --}}
				  					Edit Book Cover
				  				{{-- </button> --}}
				  			</a>							 
							{{-- </button> --}}					
				  		@endcan
				  	</p>

				  	<h6>{{substr(strip_tags($book->body), 0,200)}} <a href="{{ $book->path() }}">{{strlen(strip_tags($book->body)) > 200 ? "...READ MORE" : ""}}</a></h6>

				  	<p>Genres of Books:&nbsp;{{$book->genres}}</p>

				  	<h6 style="color: #f50057; display: flex;">For Free &nbsp;{{-- <p>{{$book->visits()}}</p> --}}</h6>

				  	<hr class="style14">
				  </div>
				 </div>{{--End Row --}}
			<hr>
			@empty
			<p>There are no revelent results at this time.</p>
		@endforelse

	{{-- <div class="float-right">{{ $books->links() }}</div>  --}}   {{--PAGINATION LINK FETCHED --}}

</div>{{--Container end --}}
</div>

@endsection
