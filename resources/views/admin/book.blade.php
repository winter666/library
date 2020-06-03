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
        </div>
    </div>
</div>
@endsection