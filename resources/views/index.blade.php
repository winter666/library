@extends('layouts')

@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ config('app.name', 'My Books') }}</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
            @auth
                <p class="lead text-muted">Hi, {{Auth::user()->name}}!</p>                    
            @endauth    
        </p>
    </div>
</section>

@endsection