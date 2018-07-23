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
          Add Category                
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
     <p class="card-text mb-0">Total Category</p>
      <div class="fluid-container">           
        <h1 class="card-title mb-0 animated  fadeIn" style="color: #f35626;">{{-- {{$newsCount}}  --}}</h1>      
      </div>  
  </main> 

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" >

  <div class="col-xs-2" >
    <a href="/admin/add-categories">
    <button type="button" class="btn btn-outline-success">
      Add Category
      <span data-feather="plus"></span>
    </button></a>      
      <span data-feather="chevrons-right"></span>   
      <strong> Lists of Category</strong>
       <div class="float-right">{{$categories -> links()}}</div>
  </div> 
</main> 

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background:rgb(243, 247, 253) ">
    <div class="col-xs-12">     
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead class="tablecolor">
            <tr>
              <th scope="col">S.N</th>              
              <th scope="col">Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
            @foreach($categories as $categorie)
            <tbody>
              <tr>
                <th scope="row">{{$categorie->id}}</th>
                <td>{{$categorie->name}}</td>
                <td>{{$categorie->slug}}</td>                
                <td style="display: flex;"><a href="{{action('ChannelController@edit', $categorie->id)}}"><button type="button" class="btn btn-outline-success">
                      <span data-feather="edit"></span>
                      </button>
                    </a> &nbsp; 
                      <form action="{{action('ChannelController@destroy', $categorie->id)}}" method="POST">
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
            <div class="float-right">{{$categories -> links()}}</div>
          </div>
        </div>
  </main>



@endsection