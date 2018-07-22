@extends('admin.layouts.adminlayout')

@section('bodypart')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="background-color: #F5F5F5;">
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          
    <div>
      <span data-feather="home"></span>
        <a href="/admin" class="hlw">
          Home
        </a> 
      <span data-feather="chevrons-right"></span>
        Manage Admin's                 
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
    <p class="card-text mb-0">Total Admin's</p>
      <div class="fluid-container">     
      <h1 class="card-title mb-0 animated  fadeIn" style="color: #f35626;">{{$adminCount}}</h1>      
    </div>             
</main> 

{{-- Body Part Starts for books view --}}     
     
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" >

  <div class="col-xs-2 mb-3" >
    <a href="/admin/register">
      <button type="button" class="btn btn-outline-success">
        Add Admin
        <span data-feather="plus"></span>
      </button>
    </a>      
      <span data-feather="chevrons-right"></span>   
      <strong> Lists of Users</strong>
      <div class="float-right">
        {{ $admins->links() }}
      </div>
  </div>         
</main>   
                

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" >

  <div class="col-xs-12">
    <table class="table">
      <thead class="tablecolor">
        <tr>
          <th scope="col">S.N</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Created</th>
          <th scope="col">Updated</th>
          {{-- <th scope="col">Avatar</th> --}}
          <th scope="col">Action</th>
        </tr>
      </thead>


      @foreach($admins as $admin)
        <tbody>
          <tr>
            <th scope="row">{{$admin->id}}</th>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->created_at->diffForHumans()}}</td>
            <td>{{$admin->updated_at->diffForHumans()}}</td>
        {{--     <td><img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:39px;height: 36px;top: 3px; left: 4px;"></td> --}}
            <td style="display: flex;"><a href=><button type="button" class="btn btn-outline-success">
                  <span data-feather="edit"></span>
                  </button>
                </a> &nbsp; 
                <form action="" method="POST">
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
    
     <div class="float-right">
        {{ $admins->links() }}
      </div>
  </div>
</main>



@endsection
                  
                