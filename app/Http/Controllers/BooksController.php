<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class BooksController extends Controller
{
    public function showList () {
    	$books = Books::paginate(6);
    	return view('books.list', compact('books'));
    }
}
