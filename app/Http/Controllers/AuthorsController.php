<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authors;
use App\Books;

class AuthorsController extends Controller
{

    public function showList () {
    	$authors = Authors::paginate(4);
    	foreach ($authors as $author) {
            $books[$author->id] = Books::all()->where('author_id', $author->id);
        }
    	return view('authors.list', compact('authors', 'books'));
    }

    public function showDetail ($id) {
        $author = Authors::find($id);
        if ($author) {
            $books = Books::all()->where('author_id', $author->id);
            return view('authors.detail', compact('author', 'books'));
        }
        return redirect('404');
    }
}
