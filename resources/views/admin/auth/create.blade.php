@extends('admin.layouts.adminlayout')

@section('bodypart')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background:rgb(243, 247, 253) ">
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          
    <div>
      <span data-feather="home"></span>
        <a href="" class="hlw">
          Home
        </a>                                                                
      <span data-feather="chevrons-right"></span>
        Add Register
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



<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background:rgb(243, 247, 253) ">

	<form method="POST" action="/admin/register">

		{{ csrf_field() }}
		
		<div class="form-group row">
		    <label class="col-sm-3 control-label  col-form-label" > Name </label>
		    <div class="col-sm-9">
		      <input type="text" id="form-field-1" name="name" class="col-xs-10 col-sm-5" value="{{old('title')}}">
		    </div>
		</div>

		<div class="form-group row">
		    <label class="col-sm-3 control-label  col-form-label" > Email: </label>
		    <div class="col-sm-9">
		      <input type="email" id="form-field-1" name="email" class="col-xs-10 col-sm-5" value="{{old('aurthors')}}">
		    </div>
		</div>

		<div class="form-group row">
		    <label class="col-sm-3 control-label  col-form-label" > Password: </label>
		    <div class="col-sm-9">
		      <input type="text" id="form-field-1" name="password" class="col-xs-10 col-sm-5" value="{{old('topic')}}">
		    </div>
		</div>	


			<div class="form-group row">
			<div class="col-sm-4 off-set">
			</div>
		     <div class="col-sm-6">
		   		 <button type="submit" class="btn btn-outline-primary ml-auto">Register</button>
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