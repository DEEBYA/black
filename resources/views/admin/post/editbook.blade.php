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
        Edit Books                 
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

	<form method="POST" action="{{action('BooksController@update', $book->id)}}" enctype="multipart/form-data">

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
		    					<input type="number" class="form-control"  name="ages" placeholder="Enter Book Title"value="{{$book->ages}}" required>
		  				</div>
					</div>
				   	<div class="col">
				   		<div class="form-group">
				    		<label for="exampleInputEmail1">PDF*</label>
				    			<input type="file" class="form-control" name="pdf" required>
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
		    					<wysiwyg name="body" ></wysiwyg>
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

@endsection