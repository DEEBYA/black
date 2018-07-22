<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Slide;
use App\Quotes;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('view');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
        public function view()
    
        {
            $slides = Slide::latest()->get();

            $quotes = Quotes::latest()->get();

            return view('welcome',compact('slides','quotes'));
    
        }

    public function index()
    {
        return view('home');
    }
    
}
