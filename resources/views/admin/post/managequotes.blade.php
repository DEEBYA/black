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
        Manage Quotes                 
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
  <p class="card-text mb-0">Total Quotes</p>
      <div class="fluid-container">           
        <h1 class="card-title mb-0 animated  fadeIn" style="color: #f35626;">{{$quotesCount}} </h1>      
      </div>  
</main> 

{{-- Body Part Starts for books view --}}     
     
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" >

  <div class="col-xs-2" >
    <a href="/admin/add-quotes">
    <button type="button" class="btn btn-outline-success">
      Add Quotes
      <span data-feather="plus"></span>
    </button></a>      
      <span data-feather="chevrons-right"></span>   
      <strong> Lists of Quotes</strong>
  </div>
</main>   

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" >
  <div class="col-xs-12">
    <table class="table">
      <thead class="tablecolor">
        <tr>
          <th scope="col">S.N</th>          
          <th scope="col">Authors</th>                  
          <th scope="col">Body</th>   
          <th scope="col">Option</th>       
        </tr>
      </thead>

      @foreach($quotes as $quote)
        <tbody>
          <tr>
            <th scope="row">{{$quote->id}}</th>
            <td>{{$quote->title}}</td>            
            <td>{{substr($quote->body, 0,50)}} {{strlen($quote->body) > 50 ? "....." : ""}}</td>            
            <td style="display: flex;"><a href="{{action('QuotesController@edit', $quote->id)}}"><button type="button" class="btn btn-outline-success">
                  <span data-feather="edit"></span>
                  </button>
                </a> &nbsp; 
                <form onSubmit="return confirm('Are u sure you want to delete this.')" 
                  method="POST" action="{{route('quotes.destroy', $quote->id)}}" >
                  @csrf
                  @method('delete')
                 <button type="submit" class="btn btn-outline-danger"><span data-feather="delete"></span></button>
                </form>
            </td>
          </tr>   
        </tbody>
      @endforeach
    </table>
  </div>
</main>



@endsection
