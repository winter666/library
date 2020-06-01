<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Authors;

class BooksController extends Controller
{
    public function showList () {
    	$books = Books::paginate(6);
    	return view('books.list', compact('books'));
    }

    public function ShowDetail ($id) {
    	$book = Books::find($id);
    	$author = Authors::find($book->author_id);
    	return view('books.detail', 
    		[
    			'book' => $book, 
    			'author' => $author
    		]
    	);
    }
}
