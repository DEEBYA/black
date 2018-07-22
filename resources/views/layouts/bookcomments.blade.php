{{-- <h2>Comments</h2><hr> --}}


<reply :attributes="{{ $reply }}" inline-template v-cloak>
	<div class="card border-dark mb-3" style="max-width: 87rem;">
	  <div class="card-header">
	  	<div class="d-flex">
	  		<div class="p-2">
	  			@if(auth()->check())
	  			<img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:39px;height: 36px;top: 3px; left: 4px; border-radius: 50%;" alt="image">
	  			@endif
			  	<a href="/profiles/{{$reply->owner->name}}">
			  		{{$reply->owner->name}}
			  	</a> 
			  	&nbsp; Said &nbsp;{{$reply->created_at->diffForHumans()}}...

	  		</div>	  
	  		{{-- Favorites Button ko lagi --}}
	  		@if(auth()->check())
				<div class="ml-auto p-2">
					<favorite :reply="{{$reply}}"></favorite>
				  	{{-- {{$reply->favorites()->count()}}
				  	<form action="/replies/{{$reply->id}}/favorites" method="POST">
				  		{{csrf_field()}}
				  		<button type="submit" class="btn btn-default">Favorites</button>
				  		<span class="oi oi-heart"></span>
				  	</form> --}}
				</div>
			@endif	
		</div>		
	  </div>

	  <div class="card-body text-dark">
		<div v-if="editing">
			<div class="form-group">
	  			<textarea class="form-control" v-model="body"></textarea>
	  		</div>
	  		<button class="btn btn-xs btn-primaey" @click ="update">Update</button>
	  		<button type="button" class="btn btn-link" @click="editing = false">Cancel</button>
	    </div>	
	    <div v-else v-text="body">
	    	{{-- <h5 class="card-title">{{$reply->body}}</h5>     --}}
	    </div>
	  </div>

	  	{{-- Deleting the Comment by an authenicated user--}}
	    @can('update', $reply)
		  <div class="card-footer" style="display: flex;">
		  	<button class="btn btn-info btn-sm mr-2" @click= "editing = true">Edit</button>
		  	<button class="btn btn-danger btn-sm" @click= "destroy">Delete</button>
			  	{{-- <form method="POST" action="/replies/{{$reply->id}}">
			  		@csrf
			  		{{method_field('DELETE')}}
			  		<button type="submit" class="btn btn-danger btn-sm">Delete</button>		  		
			  	</form> --}}
		  </div>
		@endcan  
	</div>
</reply>