<?php 

namespace App\Http\Controllers;

use App\Reply;
use App\Book;
use App\Inspections\Spam;

use Illuminate\Http\Request;

class ReplyController extends Controller
{

    public function __construct()
    {

		$this->middleware('auth');

	}

	public function store($channelId, Book $book, Spam $spam)	
	{		
		$this->validate(request(),[
			'body' => 'required'
		]);
		try {
			
		// spam Detection
		$spam->detect(request('body'));
		

		$book->addReply([
			'body' =>request('body'),
			'user_id' => auth()->id()
		]);
		
		} catch (\Exception $e) {
				
				return response(
					// 422 Unporecessable entity
					'Sorry, your reply could not be saved at this time.',422
				);
		}

		return back()->with('flash','Your reply has been left.');
	}
	public function update(Reply $reply,Spam $spam )
	{
		$this->authorize('update', $reply);

		try{

	        $this->validate(request(), ['body' => 'required']);
	        $spam->detect(request('body'));
	        $reply->update(request(['body']));
	        
		} catch (\Exception $e){
			return response(
				'Sorry Your reply could not be saved at this time.',422
			);
		}

	}

	public function destroy(Reply $reply)
	{
		$this->authorize('update',$reply);

		$reply->delete();
		if(request()->expectJson()){
			return response(['status' => 'Reply delted']);
		}
		return back();
	}
}
