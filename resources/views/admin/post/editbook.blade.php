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
		
		<div class="form-group row">
		    <label class="col-sm-3 control-label  col-form-label" > Book Title: </label>
		    <div class="col-sm-9">
		      <input type="text" id="form-field-1" name="title" class="col-xs-10 col-sm-5" value="{{$book->title}}">
		    </div>
		</div>

		<div class="form-group row">
		    <label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> Book Aurthor: </label>
		    <div class="col-sm-9">
		      <input type="text" id="form-field-1" name="aurthors" class="col-xs-10 col-sm-5" value="{{$book->aurthors}}">
		    </div>
		</div>		

		<div class="form-group row">
		    <label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> Book Genres: </label>
		    <div class="col-sm-9">
		      <input type="text" id="form-field-1" name="genres" class="col-xs-10 col-sm-5" value="{{$book->genres}}">
		    </div>
		</div>

		<div class="form-group row">
	        <label class="col-sm-3 control-label no-padding-right col-form-label" 
	        	for="form-field-1"for="form-field-1">Choose a Channel:</label>
	        	<div class="col-sm-9">
		            <select name="channel_id" id="form-field-1" class="col-xs-10 col-sm-5" required>
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
	    
		<div class="form-group row">
		    <label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> Ages From: </label>
		    <div class="col-sm-9">
		      <input type="number" id="form-field-1" name="ages" class="col-xs-10 col-sm-5" value="{{$book->ages}}">
		    </div>
		</div>		

		<div class="form-group row">
		    <label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> No of Books words: </label>
		    <div class="col-sm-9">
		      <input type="number" id="form-field-1" name="words" class="col-xs-10 col-sm-5" value="{{$book->words}}">
		    </div>
		</div>
		       
		<div class="form-group row">
		    <label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> Book Description: </label>
		    <div class="col-sm-9">
		      <textarea class="col-xs-10 col-sm-5" id="" name="body" rows="3" type="textarea" value="{{$book->body}}"></textarea>
		    </div>
		</div>

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
		   		 <button type="submit" class="btn btn-outline-primary ml-auto">Update</button>
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