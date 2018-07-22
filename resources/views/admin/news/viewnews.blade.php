@extends('admin.layouts.adminlayout')

@section('bodypart')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background:rgb(243, 247, 253) ">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
      align-items-center pb-2 mb-3 border-bottom">            
      <div>
        <span data-feather="home"></span>
          <a href="" class="hlw">
            Home
          </a> 
        <span data-feather="chevrons-right"></span>
          Add News                
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
     <p class="card-text mb-0">Total News</p>
      <div class="fluid-container">           
        <h1 class="card-title mb-0 animated  fadeIn" style="color: #f35626;">{{$newsCount}} </h1>      
      </div>  
  </main> 

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" >

  <div class="col-xs-2" >
    <a href="/admin/add-news">
    <button type="button" class="btn btn-outline-success">
      Add News
      <span data-feather="plus"></span>
    </button></a>      
      <span data-feather="chevrons-right"></span>   
      <strong> Lists of News</strong>
      <div class="float-right">{{$news -> links()}}</div>
  </div> 
</main> 

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background:rgb(243, 247, 253) ">
    <div class="col-xs-12">     
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead class="tablecolor">
            <tr>
              <th scope="col">S.N</th>
              <th scope="col">Title</th>
              <th scope="col">Authors</th>   
              <th scope="col">Topic</th> 
              <th scope="col">Min To Read</th>       
              <th scope="col">Body</th>
              <th scope="col">News Cover</th>
              <th scope="col">Options</th>
            </tr>
          </thead>

          @foreach($news as $new)
            <tbody>
              <tr>
                <th scope="row">{{$new->id}}</th>
                <td>{{$new->title}}</td>
                <td>{{$new->aurthors}}</td> 
                <td>{{$new->topic}}</td>          
                <td>{{$new->minimum}}</td>
                <td>{{substr($new->body, 0,50)}} {{strlen($new->body) > 50 ? "....." : ""}}</td>
                <td class="zoom"><img src="/storage/news_images/{{$new->news_img}}" style="width: 60px;"></td>
                <td style="display: flex;"><a href="{{action('NewsController@edit', $new->id)}}"><button type="button" class="btn btn-outline-success">
                      <span data-feather="edit"></span>
                      </button>
                    </a> &nbsp; 
                    <form action="{{action('NewsController@destroy', $new->id)}}" method="POST">
                      {{ csrf_field() }}
                      {{method_field('DELETE')}}
                      {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                     <button type="submit" class="btn btn-outline-danger"><span data-feather="delete"></span></button>
                     </form> 
                </td>
              </tr>   
            </tbody>
          @endforeach
            </table>
            <div class="float-right">{{$news -> links()}}</div>
          </div>
        </div>
  </main>



@endsection