@extends('layouts.app')

@section('content')

	<div class="container">
		<h1>My Books</h1>
		<div style="border-bottom: 6px double rgb(229, 229, 229);"></div>

		<img src="/storage/cover_images/{{$book->book_img}}" style="width: 159px;">
	<hr>
	<p>Which part of your book would you like to edit today?</p><br><br><br>
	<div class="row" style="display: flex;">
	<!-- Button trigger modal -->
	<div class="col">
	<button type="button" class="colorbutton " data-toggle="modal" data-target="#exampleModalLong">
	  Edit Book Info
	</button> 
	<!-- Modal -->
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document" style="max-width: 1070px;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h2 class="modal-title" id="exampleModalLongTitle"><b>Edit Book Info</b></h2><br>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <p style="text-align: center;">All fields marked with an * are mandatory fields.</p>
	      <div class="modal-body">

	      	{{--FORM TO CREATE THE BOOK  --}}

		        <form method="POST" action="/create" enctype="multipart/form-data">
					{{ csrf_field() }}

				<div class="row">			
				 	<div class="col">
				 		<div class="form-group">
		    				<label for="exampleInputEmail1">Book Title*</label>
		    					<input type="text" class="form-control"  name="title" placeholder="Enter Book Title" value="{{old('title')}}" required>
		  				</div>
					</div>
				   	<div class="col">
				   		<div class="form-group">
				    		<label for="exampleInputEmail1">Book Aurthor*</label>
				    			<input type="text" class="form-control" name="aurthors" placeholder="Enter Aurthor Name" value="{{old('aurthors')}}" required>
				 		 </div>
					</div>
				</div>

				<div class="row">			
				 	<div class="col">
				 		<div class="form-group">
		    				<label for="genres">Book Genres*</label>
		    					<input type="text" class="form-control"  name="genres" placeholder="Enter Book Title" value="{{old('genres')}}" required>
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
		    					<input type="number" class="form-control"  name="ages" placeholder="Enter Book Title" value="{{old('ages')}}" required>
		  				</div>
					</div>
				   	<div class="col">
				   		<div class="form-group">
				    		<label for="exampleInputEmail1">No of Books words*</label>
				    			<input type="number" class="form-control" name="words" placeholder="Enter Aurthor Name" value="{{old('words')}}" required>
				 		 </div>
					</div>
				</div>

				<div class="row">			
				 	<div class="col">
				 		<div class="form-group">
		    				<label for="exampleInputEmail1">Book Description*</label>
		    					<textarea type="number" class="form-control"  name="body" placeholder="Enter Book Title" value="{{old('body')}}" required></textarea>
		  				</div>
					</div>

				    	<div class="col">
				   		<div class="form-group">
				    		<label for="exampleInputEmail1">PDF*</label>
				    			<input type="file" class="form-control" name="pdf" required>
				 		 </div>
					</div>

				</div>  		

			{{-- 	<div class="form-group row">
					<div class="col-sm-4 off-set"></div>			
					<div class="col-sm-5">
				  		<input type="file" class="col-xs-10 col-sm-5" id="customFile" name="book_img">
				  		<label class="custom-file-label col-sm-6" for="customFile">Choose file</label>		  		
					</div>
				</div> --}}

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
		
</div> {{-- End Of Container --}}

<div class="col">
	<button type="button" class="colorbutton2" data-toggle="modal" data-target="#second">
	  Edit Cover
	</button> 
<!-- Modal -->
<div class="modal fade" id="second" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 1070px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	 <form method="POST" action="/create" enctype="multipart/form-data">
					{{ csrf_field() }}
        	<div class="form-group row">
					<div class="col-sm-4 off-set"></div>			
					<div class="col-sm-5">
				  		<input type="file" class="col-xs-10 col-sm-5" id="customFile" name="book_img">
				  		<label class="custom-file-label col-sm-6" for="customFile">Choose file</label>		  		
					</div>
				</div> 

				<div class="form-group row">
					<div class="col-sm-4 off-set">
					</div>
				     <div class="col-sm-6">
				   		 <button type="submit" class="btn btn-outline-primary ml-auto">Upload</button>
					</div>
				</div>

			</form>
      </div>
     
    </div>
  </div>
</div>
</div>


<div class="col"></div>
</div>
</div>

@endsection