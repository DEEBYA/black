<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function show(){

		$search = request('q');

		$books = Book::search($search)->paginate(25);
		if (request()->expectsJson()){
			return $books;
		}

		return view('books', compact('books'));
	}
}
