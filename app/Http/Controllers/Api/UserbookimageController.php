<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserbookimageController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth'); 
    }

    public function store()
    {
    	// dd(request()->all());
    	$this->validate(request(),[
    		'book' =>['required','image']
    	]);
    	auth()->user()->update([
    		'book_path' =>request()->file('book')->storeAs('books','public')
    	]);

    	return back();
    }
}
