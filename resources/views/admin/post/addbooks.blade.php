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
        Add Books                 
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
	<h1 style="text-align: center;">Add Books</h1><hr>
	<form method="POST" action="/admin/add-books" enctype="multipart/form-data" {{-- class="dropzone" id="my-awesome-dropzone" --}}>

		{{ csrf_field() }}
		
		<div class="form-group row">
		    <label class="col-sm-3 control-label  col-form-label" > Book Title* </label>
		    <div class="col-sm-9">
		      <input type="text" id="form-field-1" name="title" class="col-xs-10 col-sm-5" value="{{old('title')}}">
		    </div>
		</div>

		<div class="form-group row">
		    <label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> Author's Name* </label>
		    <div class="col-sm-9">
		      <input type="text" id="form-field-1" name="aurthors" class="col-xs-10 col-sm-5" value="{{old('aurthors')}}">
		    </div>
		</div>		

		<div class="form-group row">
		    <label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> Book Genres: </label>
		    <div class="col-sm-9">
		      <input type="text" id="form-field-1" name="genres" class="col-xs-10 col-sm-5" value="{{old('genres')}}">
		    </div>
		</div>

		<div class="form-group row">
	        <label class="col-sm-3 control-label no-padding-right col-form-label" 
	        	for="form-field-1"for="form-field-1">Category*</label>
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
		    <label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> Age Recommendation* </label>
		    <div class="col-sm-9">
		      <input type="number" id="form-field-1" name="ages" class="col-xs-10 col-sm-5" value="{{old('ages')}}">
		    </div>
		</div>		

		<div class="form-group row">
		    <label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> No of Books words: </label>
		    <div class="col-sm-9">
		      <input type="number" id="form-field-1" name="words" class="col-xs-10 col-sm-5" value="{{old('words')}}">
		    </div>
		</div>
		       
		<div class="form-group row">
		    <label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> Book Description: </label>
		    {{-- <div class="col-sm-9"> --}}
		    	<wysiwyg name="body" ></wysiwyg>
		      {{-- <textarea class="col-xs-10 col-sm-5" id="" name="body" rows="3" type="textarea" {{old('body')}}></textarea> --}}
		    {{-- </div> --}}
		</div>

		{{-- <div class="form-group " style="display: flex;">
			<label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> PDF File </label>
			<div class="col-sm-4 off-set" ></div>
				<div class="col-sm-5 margin_center">
		    		<input type="file" class="col-xs-10 col-sm-5" name="pdf" id="customFile" 
		    		style="left: -449px;" required>	
		    </div>    
		</div> --}}

{{-- 			<div class="form-group  " style="display: flex;">
				<label class="col-sm-3 control-label no-padding-right col-form-label" for="form-field-1"> 
					Book Cover
				</label>
				<div class="col-sm-4 off-set" ></div>
				<div class="col-sm-5 margin_center">
		    		<input type="file" class="col-xs-10 col-sm-5" name="book_img" id="customFile" onchange="readURL(this);" style="left: -449px;"  required>
		    			<img id="blah" src="#" alt="your image" />		    					
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

		

</main>

@endsection

