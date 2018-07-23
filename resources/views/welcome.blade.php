@extends('layouts.app')

@section('content')

	<div class="mainbody" id="home">

		@include('layouts.background')
		
		@include('layouts.card')	<br><br>
	
	<div class="tilt" >  </div>
		<section class="case-vid">
			<div class="container tiltbody">
			    <div class="row ">
			  		<div class="col-md-6" style="text-align: justify;">
			  			<p>Abhibyakthi is a free self publishing platform that offers eBook distribution services to independent writers. Our users can share their writing, connect with other readers, and discover new books and authors – all in one place. We make eBook publishing easy and indie reading fun!</p>
		  			</div>

			  	  	<div class="col-md-6">
					   <video src="{{asset('video/FinalFantasy.mp4')}}" {{-- autoplay="" --}} poster="{{asset('images/finalfanatasy.jpg')}}" controls=""></video> 	
			  		</div>  	
	 			</div>		 
			</div>
		</section>
	</div> 


		@include('partial._grid')
<br> <br>
		@include('layouts.quotes')

@endsection