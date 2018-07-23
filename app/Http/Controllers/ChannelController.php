<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class ChannelController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');

	}

	public function index()
	{
		$categories = Channel::latest()->paginate(5);
		return view('admin.category.managecategory',compact('categories'));
	}
	
	public function create()
	{
		return view('admin.category.addcategory');

	}


    public function store(Request $request)
	{
	     $this->validate($request,[     
	        'name' => 'required',
	        'slug' => 'required'
	    ]);

	    $categories = new Channel;
	    $categories->name = $request->input('name');
	    $categories->slug = $request->input('slug');
	    $categories->save();

	    return redirect('/admin/category');
	}


	public function edit(Channel $channel)
    {
    	// $channels = Channel::all();
        return view('admin.category.editcategory', compact('channel'));
    }

    public function update(Request $request, Channel $channel)
    {
        // dd(request()->all());
        $channel -> update(request(['title']));          
        $channel ->update(request(['body']));   
        $channel->save();

        return redirect('admin/quotes');
    }

    public function destroy(Channel $channel)
    {
        $channel->delete();
        // $books = Book::find($book);
        if(request()->wantsJson()){
            return response([], 204);
        }
        return redirect('admin/category');
    }
}

