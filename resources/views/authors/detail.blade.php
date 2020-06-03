@extends('layouts')

@section('content')

@include('layouts.section_author')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="45%" y="50%">Picture</text></svg>
                            <div class="card-body">
                                <h5 class="card-title">{{$book->name}}</h5>
                                <p>
                                    <span>Author:</span>
                                    <span><strong>{{$author->name}}</strong></span>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('books.index', $book->id)}}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </a>
                                        @auth
                                            @if (Auth::user()->is_admin)
                                                <a href="{{route('book.show', $book->id)}}">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </a>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection