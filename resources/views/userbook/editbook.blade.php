@extends('layouts.app')

@section('content')
		<div class="container">
		<h1>My Books</h1>
		<div style="border-bottom: 6px double rgb(229, 229, 229);"></div>

		<img src="/storage/cover_images/{{$book->book_img}}" style="width: 159px;">
	<hr>
	<p>Which part of your book would you like to edit today?</p>
	<div class="row" style="display: flex;">
	<!-- Button trigger modal -->
	<div class="col">
	        <p style="text-align: center;"><b>All fields marked with an * are mandatory fields.</b></p>
	      <div class="modal-body">

	      	{{--FORM TO UPDATE THE BOOK  --}}

		        <form method="POST" action="{{ $book->paths() }}" enctype="multipart/form-data">
					{{ csrf_field() }}

				<div class="row">			
				 	<div class="col">
				 		<div class="form-group">
		    				<label for="exampleInputEmail1">Book Title*</label>
		    					<input type="text" class="form-control"  name="title" placeholder="Enter Book Title" value="{{$book->title}}" required>
		  				</div>
					</div>
				   	<div class="col">
				   		<div class="form-group">
				    		<label for="exampleInputEmail1">Book Aurthor*</label>
				    			<input type="text" class="form-control" name="aurthors" placeholder="Enter Aurthor Name" value="{{$book->aurthors}}" required>
				 		 </div>
					</div>
				</div>

				<div class="row">			
				 	<div class="col">
				 		<div class="form-group">
		    				<label for="genres">Book Genres*</label>
		    					<input type="text" class="form-control"  name="genres" placeholder="Enter Book Title" value="{{$book->genres}}" required>
		  				</div>
					</div>
				   	<div class="col">
				   		<div class="form-group">
				    		<label for="channel_id">Choose a Category*</label>
				    			<select name="channel_id" id="form-field-1" class="form-control" required>
				                <option value="">Choose One...</option>                                  
				                    @foreach (App\Channel::all() as $channel)
				                 		    <option value="{{ $channel->id }}" 
				                 		    	{{ old('channel_id') == $channel->id ? 'selected' : '' }}>
				                     				{{ $channel->name }}
				                   			</option>                                  
				                    @endforeach
				            </select>
				 		 </div>
					</div>
				</div>

				<div class="row">			
				 	<div class="col">
				 		<div class="form-group">
		    				<label for="exampleInputEmail1">Ages Recommendation From*</label>
		    					<input type="number" class="form-control"  name="ages" placeholder="Enter Book Title" value="{{$book->ages}}" required>
		  				</div>
					</div>
				   	<div class="col">
				   		<div class="form-group">
				    		<label for="exampleInputEmail1">PDF*</label>
				    			<input type="file" class="form-control" name="pdf" value="{{$book->pdf}}"required>
				 		 </div>
					</div>
				</div>

					<div class="col">
				   		<div class="form-group">
				    		<label for="exampleInputEmail1">Book Image*</label>
				    			<input type="file" class="form-control" name="book_img" required>
				 		 </div>
					</div>

				<div class="row">			
				 	<div class="col">
				 		<div class="form-group">
		    				<label for="exampleInputEmail1">Book Description*</label>
		    					<wysiwyg name="body" value="{{$book->body}}"></wysiwyg>
		    					{{-- <textarea type="number" class="form-control"  name="body" placeholder="Enter Book Title" value="{{old('body')}}" required></textarea> --}}
		  				</div>
					</div>   

				</div>  					

				<div class="form-group row">
					<div class="col-sm-4 off-set">
					</div>
				     <div class="col-sm-6">
				   		 <button type="submit" class="btn btn-outline-primary ml-auto">Upload</button>
					</div>
				</div>

				@if(count($errors))
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)				
						<li>{{$error}}</li>
					@endforeach
				</ul>
				@endif

			</form>
	      </div>
		</div>
	</div>
</div>


@endsection