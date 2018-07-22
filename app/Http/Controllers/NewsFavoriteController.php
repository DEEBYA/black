<?php
namespace App\Http\Controllers;
use App\News;
class NewsFavoriteController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Store a new favorite in the database.
     *
     * @param  Reply $reply
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(News $new)
    {
         $new->favorite();
     
    }

    public function destroy(News $new)
    {
        $new->unfavorite();
    }
     
}