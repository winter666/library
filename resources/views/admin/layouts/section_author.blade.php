<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ config('app.name', 'My Books') }}</h1>
        <h2>
            <strong>(Books by {{$author->name}})</strong>    
        </h2>
        <div><span><a href="{{route('authors')}}">Show another authors</a></span></div>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p class="lead text-muted">Hi, {{Auth::user()->name}}!</p>
        <div>
            <form action="{{ URL::route('author.destroy', $author->id) }}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button class="btn btn-sm btn-outline-secondary" id="evt-del" data-book_id="{{$author->id}}" data-route="/admin/authors/{{$author->id}}">Delete this Author and his books</button>
            </form>
            <div class="add_book-btn">
                <button class="btn btn-sm btn-outline-secondary" id="evt-modal">Add Book</button>
            </div>    
            <div class="background_shadow">
                <div class="modal-window">
                    <div class="close">
                        <span class="close_btn">X</span>
                    </div>
                    <div class="form-create_book">
                        <div>
                            <h4 class="form_title">Create Book for {{$author->name}}</h4>
                            <div id="errors"></div>
                            <div class="input-create">
                                <label for="book_name">Title</label><br>
                                <input type="text" name="name" id="book_name">
                            </div>
                            <div class="input-create">
                                <label for="book_desc">Description</label><br>
                                <textarea name="description" id="book_desc"></textarea>
                            </div>
                            <input type="hidden" name="author_id" value="{{$author->id}}" id="author_id">
                            <button class="btn btn-sm btn-outline-secondary" id="evt-create">Create</button>
                        </div>
                    </div>    
                </div>     
            </div>    
        </div>  
    </div>
</section>