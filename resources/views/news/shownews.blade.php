@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
		<!-- Begin Fixed Left Share -->
			<div class="col-md-2 col-xs-12">
				<div class="share" style="position:fixed;">
		
					<ul style="list-style-type:none">
						<li style="margin-left:-34px;">

							<newsfavorite :new="{{$new}}"></newsfavorite>
							
						</li>					
					</ul>
				</div>
			</div>
		<!-- End Fixed Left Share -->

		<!-- Begin Post -->
			<div class="col-md-8 col-md-offset-2 col-xs-12">
				<div class="mainheading">
					<!-- Begin Top Meta -->						
						<div class="col-md-10">			
					
					</div>
					<!-- End Top Menta -->

					<h1 class="posttitle">{{$new->title}}</h1>
				</div>

				<!-- Begin Featured Image -->
				<img class="featured-image img-fluid" src="/storage/news_images/{{$new->news_img}}" alt="">
				<!-- End Featured Image -->

				<!-- Begin Post Content -->
				<div class="article-post">
					<p>
						{{$new->body}}
					</p>
				</div>
				<!-- End Post Content -->
			</div>
		</div>
	</div>
@endsection
