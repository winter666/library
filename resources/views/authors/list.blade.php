@extends('layouts')

@section('content')

@include('layouts.section')

<div class="container">

    <div class="add_book-btn">
        <button class="btn btn-sm btn-outline-secondary" id="evt-modal">Add Author</button>
    </div>    
    <div class="background_shadow">
        <div class="modal-window">
            <div class="close">
                <span class="close_btn">X</span>
            </div>
            <div class="form-create_book">
                <form action="#" method="POST">
                    <h4 class="form_title">Create Author</h4>
                    <div class="input-create">
                        <label for="author_name">Name</label><br>
                        <input type="text" name="name" id="author_name">
                    </div>
                    <button class="btn btn-sm btn-outline-secondary" id="evt-create">Add</button>
                </form>
            </div>    
        </div>     
    </div>    
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Количество книг</th>
                @auth
                    @if (Auth::user()->is_admin)
                        <th scope="col"></th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{$author->id}}</th>
                    <td><a href="{{route('authors.index', $author->id)}}">{{$author->name}}</a></td>
                    <td>{{count($books[$author->id])}}</td>
                    @auth
                        @if (Auth::user()->is_admin)
                            <td><a href="{{route('author.show', $author->id)}}" class="btn btn-primary">Edit</a></td>
                        @endif
                    @endauth                    
                </tr>
            @endforeach    
        </tbody>
    </table>
    {{$authors->links()}}
</div> 

@endsection