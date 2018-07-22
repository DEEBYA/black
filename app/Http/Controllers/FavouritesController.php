<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Reply;
use App\News;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{

	public function __construct()
	
	{
		$this->middleware('auth');
	}

    public function store(Reply $reply)
    {
    	$reply->favorite();

    	return back();
    	// $reply->favorites()->create(['user_id' =>auth()->id()]);    		
    }

    public function destroy(Reply $reply)
    {

        $reply->unfavorite(); 
}

}
