<?php

namespace App\Http\Controllers;

use App\Quotes;
use Illuminate\Http\Request;

class QuotesController extends Controller
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
        // $quotes = Quotes::latest()->get();
        // return view('layouts.footer', compact('quotes'));
    }

    public function view()
    {
        $quotesCount = Quotes::count();
        $quotes = Quotes::latest()->get();
       return view('admin.post.managequotes', compact('quotes','quotesCount'));    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.addquotes');
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
            'body' => 'required'
        ]);

        $quote = new Quotes;
        $quote->title = $request->input('title');
        $quote->body = $request->input('body');
        $quote->save();

        return redirect('/admin/view-slide');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function show(Quotes $quotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotes $quotes)
    {
        return view('admin.post.editquotes',compact('quotes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotes $quotes)
    {
        // dd(request()->all());
        $quotes -> update(request(['title']));          
        $quotes ->update(request(['body']));   
        $quotes->save();

        return redirect('admin/quotes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotes $quotes)
    {
        // $quotes = Quotes::find($quotes);
        $quotes->delete();
        if(request()->wantsJson()){
            return response([], 204);
        }
        return redirect('/admin/view-slide');
    }
}
