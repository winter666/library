<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Authors;
use App\Books;

class AuthorController extends Controller
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
        if (!empty($request->name)) {
            $res = Authors::create(['name' => $request->name]);
            $data = [
                'id' => $res->id, 
                'name' => $request->name, 
                'message' => $request->name." Успешно добавлен",
            ];
            return json_encode($data);
        }
        $data = ['message' => 'Заполните обязательные поля!'];
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
        $author = Authors::find($id);
        if ($author) {
            $books = Books::all()->where('author_id', $author->id);
            return view('admin.author', compact('author', 'books'));
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
        if (!empty($request->name)) {
            $author = Authors::find($id);
            if ($author) {
                $author->update($request->all());
                $data = [
                    'id' => $author->id,
                    'name' => $author->name,
                    'message' => 'Автор успешно отредактирован!',
                ];
                return json_encode($data);
            }
            $data = ['message' => 'Автор не найден'];    
        } 
        $data = ['message' => 'Заполните обязательные поля112122'];
        return json_encode($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Authors::find($id);
        if ($author) {
            $authorsBooks = Books::all()->where('author_id', $author->id);
            if ($authorsBooks) {
                foreach ($authorsBooks as $book) {
                    $book->delete();
                }
            }
            $author->delete();
            return redirect(route('authors'));
        }
        return redirect('404');        
    }
}
