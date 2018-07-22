@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid jumbo">
    <div class="container">
        <div class="positioning jumbo_pos">
            <img src="/uploads/avatars/{{$profileUser->avatar}}" class="jumbo_img"> 
                <h1><strong>{{$profileUser->name}}</strong> 
                    <small>Since {{$profileUser->created_at->diffForHumans() }}</small>
                </h1>                
        </div> 
  </div>
</div>

<div class="container">
     @can('update', $profileUser)
                <form  method="POST" action="/profiles/{user}"  enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @endcan
    <div class="row">
       <div class="col-md-2">           
        </div>
        <div class="col-md-10 row align-items-end">
           
        </div>
    </div>
    
   <hr>   

            @forelse ($activities as $date => $activity)

                <h3 class="page-header">{{ $date }}</h3>

                @foreach ($activity as $record)

                     @if (view()->exists("profiles.activities.{$record->type}"))
                        @include ("profiles.activities.{$record->type}", ['activity' => $record])
                    @endif

                @endforeach

                 @empty

                    <p>There is no activity for this user yet.</p>

             @endforelse     
                          
            </div>
        </div>                         
    </div>
</div>
@endsection
