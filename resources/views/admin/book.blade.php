@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <div class="detail_content">
        <h2 class="title">{{$book->name}}</h2>
        <div class="detal_author">
            <span>Author:</span>
            <a href="{{route('authors.index', $author->id)}}" class="author_detail">
                <span class="author_value">{{$author->name}}</span>
            </a>
        </div>
        <div>
            <h4>Description:</h4>
            <p class="detail_desc">{{$book->description}}</p>
            <div>
                <form action="{{ URL::route('book.destroy', $book->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="btn btn-sm btn-outline-secondary" id="evt-del" data-book_id="{{$book->id}}" data-route="/admin/books/{{$book->id}}">Delete</button>
                </form>
            </div>
            <div class="update_book-btn">
                <button class="btn btn-sm btn-outline-secondary" id="evt-modal">Update Book</button>
            </div>    
            <div class="background_shadow">
                <div class="modal-window">
                    <div class="close">
                        <span class="close_btn">X</span>
                    </div>
                    <div class="form-create_book">
                        <form action="#" method="POST">
                            <h4 class="form_title">Update Book for {{$author->name}}</h4>
                            <div class="input-create">
                                <label for="book_name">Title</label><br>
                                <input type="text" name="name" id="book_name" value="{{$book->name}}">
                            </div>
                            <div class="input-create">
                                <label for="book_desc">Description</label><br>
                                <textarea name="description" id="book_desc">{{$book->description}}</textarea>
                            </div>
                            <div class="input-create">
                                <select>
                                    @foreach ($authors as $optionAuthor)
                                        @if ($optionAuthor->id == $author->id)
                                            <option name="author_id" value="{{$optionAuthor->id}}" selected="selected">{{$optionAuthor->name}}</option>
                                        @else
                                            <option name="author_id" value="{{$optionAuthor->id}}">{{$optionAuthor->name}}</option>
                                       @endif
                                    @endforeach
                                </select>
                            </div>     
                            <input type="hidden" name="author_id" value="{{$author->id}}">
                            <button class="btn btn-sm btn-outline-secondary" id="evt-create">Update</button>
                        </form>
                    </div>    
                </div>     
            </div>            
        </div>
    </div>
</div>
@endsection