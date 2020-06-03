<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ config('app.name', 'My Books') }}</h1>
        <h2>
            <strong>(Books by {{$author->name}})</strong>    
        </h2>
        <div><span><a href="{{route('authors')}}">Show another authors</a></span></div>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        @auth
            <p class="lead text-muted">Hi, {{Auth::user()->name}}!</p>
            @if (Auth::user()->is_admin)
                <div>
                    <form action="{{ URL::route('author.destroy', $author->id) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-sm btn-outline-secondary" id="evt-del" data-book_id="{{$author->id}}" data-route="/admin/authors/{{$author->id}}">Delete this Author and his books</button>
                    </form> 
                </div>
            @endif
        @endauth    
    </div>
</section>