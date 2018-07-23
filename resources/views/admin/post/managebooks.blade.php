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
        Manage Books              
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
    <p class="card-text mb-0">Total Books</p>
    <div class="fluid-container">     
      
      <h1 class="card-title mb-0 animated  fadeIn" style="color: #f35626;">{{$bookCount}}</h1>
      
    </div>                       
</main> 

{{-- Body Part Starts for books view --}}     
     
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" >

  <div class="col-xs-2" >
    <a href="/admin/add-books">
      <button type="button" class="btn btn-outline-success">
        Add Books
        <span data-feather="plus"></span>
      </button>
    </a>      
      <span data-feather="chevrons-right"></span>   
      <strong> Lists of Books</strong>
      <div class="float-right">
        {{ $books->links() }}
      </div>
  </div>
</main>   

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" >
  <div class="col-xs-12">
    <table class="table">
      <thead class="tablecolor">
        <tr>
          <th scope="col">S.N</th>
          <th scope="col">Title</th>
          <th scope="col">Authors</th>
          <th scope="col">Genres</th>
          <th scope="col">Ages</th>
          <th scope="col">Replies</th>
          <th scope="col">Body</th>
          <th scope="col">Cover</th>
          <th scope="col">Options</th>
        </tr>
      </thead>


      @foreach($books as $book)
        <tbody>
          <tr>
            <th scope="row">{{$book->id}}</th>
            <td>{{$book->title}}</td>
            <td>{{$book->aurthors}}</td>
            <td>{{$book->genres}}</td>
            <td>{{$book->ages}}</td>
            <td>{{$book->replies_count}}</td>
            <td>{{substr(strip_tags($book->body), 0,50)}} 
              <a href="#" class="btn btn-link" style="color:#00aeff; text-decoration:#2196f3 wavy underline;" data-toggle="modal" data-target="#exampleModal">
                {{strlen(strip_tags($book->body)) > 50 ? "...Read More" : ""}}
              </a>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      {{strip_tags($book->body)}}
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td><img src="/storage/cover_images/{{$book->book_img}}" style="width: 60px;"></td>
            <td style="display: flex;"><a href="{{action('BooksController@edit', $book->id)}}">
              <button type="button" class="btn btn-outline-success">
                  <span data-feather="edit"></span>
                </button>
                </a> &nbsp; 
                <form onSubmit="return confirm('Are u sure you want to delete this.')" 
                   method="POST" action="{{route('books.destroy', $book->id)}}" >
                  @csrf
                  @method('delete')
                  {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                 <button type="submit" class="btn btn-outline-danger"><span data-feather="delete"></span></button>
                </form>
            </td>
          </tr>   
        </tbody>
      @endforeach
    </table>
    
     <div class="float-right">
        {{ $books->links() }}
      </div>
  </div>
</main>



@endsection
                  
                