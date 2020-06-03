@extends('layouts')

@section('content')

@include('layouts.section')

<div class="container">
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