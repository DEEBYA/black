<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Filters\BookFilters;
use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin')->except('index','show','fetching');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel, BookFilters $filters )
    { 
        $books = $this->getThreads($channel, $filters);
        if(request()->wantsJson()){
            return $books;
        }
        return view('books', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function fetching( $book)    
        {
            // return $book
            return Book::latest()->get();        
        }

        public function viewer(Book $book)    
        {
            // $book = Book::all();
           // return $book; 
            return view('layouts.pdfviewer',compact('book'));
        }

      public function views()
    {
        $bookCount = Book::count();
        $books = Book::latest()->paginate(1);
        // return $books;
        return view('admin.post.managebooks', compact('books','bookCount'));
    }


    public function create()
    {
        return view('admin.post.addbooks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
          $this->validate($request,[
            'title' => 'required',
            'channel_id'=>'required|exists:channels,id',
            'aurthors' => 'required',
            'genres' => 'required',
            'ages' => 'required',
            'words' => 'required',
            'body' => 'required'
        ]);

         if($request->hasFile('book_img')){
            $filenameWithExt = $request->file('book_img')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('book_img')->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('book_img')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore ='noimage.jpg';          
        }
         
       $book = Book::create([
            'user_id' =>auth()->id(),
            'title' => request('title'),
            'channel_id' => request('channel_id'),
            'aurthors' => request('aurthors'),
            'slug' => request('title'),
            'body' => request('body'),
            'genres' => request('genres'),
            'ages' => request('ages'),
            'words' => request('words')
            // 'pdf' => $pdf
        ]);
        // $book->save();

        // Book::create([
        //     'title' => request('title'),
        //     'aurthors' => request('aurthors'),
        //     'body' => request('body'),
        //     'book_img' => request('book_img')
        // ]);

        return redirect('admin/view-books')->with('flash','Your Books has been published');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    // public function show($channelId, Book $book)
    // {       
    //     return view('bookshow',[
    //         'book' => $book,
    //         'replies' => $book->replies()->paginate(1)
    //     ]);
    // } 

    /**  
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($book)
    {
        $book = Book::find($book);
        // dd($book);
        return view('admin.post.editbook', compact('book', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
         $this->validate($request,[
            'title' => 'required',
            'channel_id'=>'required|',
            'book_img' => 'required',
            'aurthors' => 'required',
            'genres' => 'required',
            'ages' => 'required',
            'words' => 'required',
            'body' => 'required'
        ]);
         // dd(request()->all());
         if($request->hasFile('book_img')){
            $filenameWithExt = $request->file('book_img')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('book_img')->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('book_img')->storeAs('public/cover_images', $fileNameToStore);
        }
        
        // $book->update(request(['title']));
        // $book->update(request(['channel_id']));
        // $book->update(request(['aurthors']));
        // $book->update(request(['body']));
        // $book->update(request(['genres']));
        // $book->update(request(['ages']));
        // $book->update(request(['words']));
        
        $book = Book::find($book);
        $book->title = $request->get('title');
        $book->channel_id = $request->get('channel_id');
        $book->aurthors = $request->get('aurthors');
        $book->body = $request->get('body');
        $book->genres = $request->get('genres');
        $book->ages = $request->get('ages');
        $book->words = $request->get('words');

        if($request->hasFile('book_img')){
            $book->book_img = $fileNameToStore;
        }
       $book->save();

        return redirect('admin/view-books');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // $books = DB::table('book')->delete();

        // DELETE books where id = 1; LOL
                
        $book->delete();
        if(request()->wantsJson()){
            return response([], 204);
        }      
        return redirect('admin/view-books');
    }

    protected function getThreads(Channel $channel, BookFilters $filters)
    {
        $books = Book::latest()->filter($filters);
        if ($channel->exists) {
            $books->where('channel_id', $channel->id);
        }
        return $books->paginate(5);
    }
}

