<?php

namespace App\Http\Controllers;

use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth:admin')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest();

        if($month = request('month')){
            $news->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if( $year = request('year')){
            $news->whereYear('created_at', $year);
        }
        $news=$news->get();

        $archives = News::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
            
        return view('news/viewnews', compact('news','archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function view()
    {
        $newsCount = News::count();
        $news = News::latest()->paginate(10);
        return view('admin.news.viewnews',compact('news','newsCount'));
    }


    public function create()
    {
        return view('admin.news.addnews');
    }

    /**
     * Store a newly created resource in storage.

     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
            'news_img' => 'image|nullable|max:1999',
            'aurthors' => 'required',  
            'topic' => 'required',  
            'minimum' => 'required',           
            'body' => 'required'
        ]);        


        // $request->creating();
        if($request->hasFile('news_img')){
            $filenameWithExt = $request->file('news_img')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('news_img')->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('news_img')->storeAs('public/news_images', $fileNameToStore);
        }else{
            $fileNameToStore ='noimage.jpg';          
        }
        $news = new News;
        $news->title = $request->input('title');
        $news->aurthors = $request->input('aurthors');
        $news->topic = $request->input('topic');
        $news->minimum = $request->input('minimum');
        $news->body = $request->input('body'); 
        $news->news_img = $fileNameToStore;


        $news->save();

        // Book::create([
        //     'title' => request('title'),
        //     'aurthors' => request('aurthors'),
        //     'body' => request('body'),
        //     'book_img' => request('book_img')
        // ]);

        return redirect('admin/view-news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $new)     
    {     
        return view('news.shownews', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $new)
    {

        return view('admin.news.editnews',compact('news','new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request,[
            'title' => 'required',
            'news_img' => 'image|nullable|max:1999',
            'aurthors' => 'required',  
            'topic' => 'required',  
            'minimum' => 'required',           
            'body' => 'required'
        ]);        


        // $request->creating();
        if($request->hasFile('news_img')){
            $filenameWithExt = $request->file('news_img')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extension = $request->file('news_img')->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uplopad the image
            $path =$request->file('news_img')->storeAs('public/news_images', $fileNameToStore);
             
        }
         
        $news -> update(request(['title']));    
        $news ->update(request(['aurthors']));
        $news-> update(request(['topic']));
        $news ->update(request(['minimum']));
        $news ->update(request(['body']));
    
    if($request->hasFile('news_img')){
            $news->news_img = $fileNameToStore;
        }
       $news->save();

        return redirect('admin/view-news');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        // $books = Book::find($book);
        if(request()->wantsJson()){
            return response([], 204);
        }
        return redirect('admin/view-news');
    }
}
