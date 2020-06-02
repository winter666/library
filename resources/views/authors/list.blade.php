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
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{$author->id}}</th>
                    <td><a href="{{route('authors')}}/{{$author->id}}">{{$author->name}}</a></td>
                    <td>{{count($books[$author->id])}}</td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    {{$authors->links()}}
</div> 

@endsection