<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
	return view('index');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['admin']], function(){
	Route::get('/books/{id}', 'BookController@show')->name('book.show');
	Route::delete('/books/{id}', 'BookController@destroy')->name('book.destroy');
	Route::post('/books/{id}', 'BookController@update')->name('book.update');
	Route::post('authors', 'BookController@store')->name('book.store');

	Route::get('/authors/{id}', 'AuthorController@show')->name('author.show');
	Route::delete('/authors/{id}', 'AuthorController@destroy')->name('author.destroy');
	Route::post('/authors/{id}', 'AuthorController@update')->name('author.update');
});

Route::get('/books/', 'BooksController@showList')->name('books');
Route::get('/books/{id}', 'BooksController@showDetail')->name('books.index');

Route::get('/authors/', 'AuthorsController@showList')->name('authors');
Route::get('/authors/{id}', 'AuthorsController@showDetail')->name('authors.index');

Route::post('/books/', 'Admin\BookController@store')->middleware('admin');
Route::post('/authors/', 'Admin\AuthorController@store')->name('author.store')->middleware('admin');

Auth::routes();

Route::get('/home/', 'HomeController@index')->name('home');
