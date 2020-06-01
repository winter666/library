<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Authors;

class BooksController extends Controller
{
    public function showList () {
    	$books = Books::paginate(6);
    	$authors = Authors::all();
    	return view('books.list', compact('books', 'authors'));
    }

    public function showDetail ($id) {
    	$book = Books::find($id);
    	$author = Authors::find($book->author_id);
    	return view('books.detail',  compact('book', 'author'));
    }
}
