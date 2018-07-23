<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Filters\BookFilters;
use App\Book;

use Illuminate\Http\Request;

class UserbookController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        // $book = Book::all();
        // return $book;
        return view('userbook.createbook',compact('book'));
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
            'body' => 'required',
            'pdf' => 'required'
        ]);      
          if($request->hasFile('pdf')){
            $filenameWithExt = $request->file('pdf')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('pdf')->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('pdf')->storeAs('public/pdf_store', $fileNameToStore);
        }else{
            $fileNameToStore ='nopdf.pdf';          
        }

            if($request->hasFile('book_img')){
            $filenameWithExt = $request->file('book_img')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('book_img')->getClientOriginalExtension();
            // Filename To Store
            $bookimagetostore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('book_img')->storeAs('public/cover_images', $bookimagetostore);
        }else{
            $bookimagetostore ='noimage.jpg';          
        }
         

        $book = Book::create([
            'user_id' =>auth()->id(),
            'title' => request('title'),
            'channel_id' => request('channel_id'),
            'slug' => request('title'),
            'aurthors' => request('aurthors'),
            'body' => request('body'),
            'genres' => request('genres'),
            'ages' => request('ages'),
            'pdf' => $fileNameToStore,
            'book_img' => $bookimagetostore
        ]);

        return redirect('/books')->with('flash','Your Books has been published');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
   public function show($channelId, Book $book)
    {   
        
        if (auth()->check()) {
           auth()->user()->read($book);
        }
        $book->increment('visits');
        
        return view('bookshow',[
            'book' => $book,
            'replies' => $book->replies()->paginate(1)
        ]);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function edit($channelId, Book $book)
    {
        // return $book;
        //   if (auth()->check()) {
        //    auth()->user()->read($book);
        // }
       return view('userbook.editbook', compact('book', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
      $this->validate($request,[
            'title' => 'required',
            'channel_id'=>'required|',
            'book_img' => 'required',
            'aurthors' => 'required',
            'genres' => 'required',
            'ages' => 'required',
            'body' => 'required'
        ]);
         // dd(request()->all());
          if($request->hasFile('pdf')){
            $filenameWithExt = $request->file('pdf')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('pdf')->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('pdf')->storeAs('public/pdf_store', $fileNameToStore);
        }else{
            $fileNameToStore ='nopdf.pdf';          
        }

            if($request->hasFile('book_img')){
            $filenameWithExt = $request->file('book_img')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('book_img')->getClientOriginalExtension();
            // Filename To Store
            $bookimagetostore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('book_img')->storeAs('public/cover_images', $bookimagetostore);
        }else{
            $bookimagetostore ='noimage.jpg';          
        }
       
        
        $book = Book::find($book);
        $book->title = $request->get('title');
        $book->channel_id = $request->get('channel_id');
        $book->aurthors = $request->get('aurthors');
        $book->body = $request->get('body');
        $book->genres = $request->get('genres');
        $book->ages = $request->get('ages');
        
        if($request->hasFile('book_img')){
            $book->book_img = $bookimagetostore;
        }
          if($request->hasFile('pdf')){
            $book->pdf = $fileNameToStore;
        }

       $book->save();

        return redirect('/book');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($channel, Book $book)
    {
        $this->authorize('update', $book);

        $book->delete();
 
        if (request()->wantsJson()) {
            return response([], 204);
        }
        return redirect('/books');
    }
}
