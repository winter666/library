@extends('layouts')

@section('content')

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">{{ config('app.name', 'My Books') }}</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary my-2">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="btn btn-secondary my-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif                    
                @else
                    <p class="lead text-muted">Hi, {{Auth::user()->name}}!</p>
                    <a class="btn btn-primary my-2" href="{{ route('logout') }}"
                        onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>                      
                @endguest
                <p class="lead text-muted"><strong>Books by {{$author->name}}</strong></p>    
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="45%" y="50%">Picture</text></svg>
                            <div class="card-body">
                                <h5 class="card-title">{{$book->name}}</h5>
                                <div>
                                    <span>Author:</span>
                                    <span><strong>{{$author->name}}</strong></span>
                                </div>
                                <p class="card-text">{{$book->description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('books')}}/{{$book->id}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
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