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
        </p>
    </div>
</section>

@endsection