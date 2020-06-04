<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Books;
use App\Authors;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->name) && !empty($request->author_id) && !empty($request->description)) {
            $res = Books::create([
                'name' => $request->name,
                'description' => $request->description,
                'author_id' => $request->author_id,
            ]);
            if ($res->id) {
                $author = Authors::find($res->author_id);
                $data = [
                    'id' => $res->id, 
                    'name' => $request->name,
                    'author_id' => $author->id,
                    'author' => $author->name,
                    'message' => 'Книга "' . $request->name . '" Успешно добавлена (Автор: ' . $author->name . ')',
                ];
                return json_encode($data);
            }
        }
        $data = ['message' => 'Не удалось добавить книгу'];
        return json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Books::find($id);
        if ($book) {
            $author = Authors::find($book->author_id);
            $authors = Authors::all();
            return view('admin.book', compact('book', 'author', 'authors')); 
        }
        return redirect('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!empty($request->name) && !empty($request->description) && !empty($request->author_id)) {
            $book = Books::find($id);
            $author = Authors::find($request->author_id);
            if (!empty($book) && !empty($author)) {
                $book->update($request->all());
                $data = [
                    'id' => $book->id,
                    'name' => $book->name,
                    'description' => $book->description,
                    'author_id' => $book->author_id,
                    'author' => $author->name,
                    'message' => $book->name . " успешно редактирована (Автор: " . $author->name . ")"
                ];
            } else {
                $data = ['message' => 'Не удалось сохранить изменения'];
            }
            return json_encode($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::find($id);
        if ($book) {
            $book->delete();
            return redirect(route('books'));
        }
        return redirect('404');
    }
}
