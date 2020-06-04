@extends('layouts')

@section('content')

@include('layouts.section')

    <div class="album py-5 bg-light">
        <div class="container">
            @auth
                @if(Auth::user()->is_admin)
                    <div class="add_book-btn">
                        <button class="btn btn-sm btn-outline-secondary" id="evt-modal">+ Add Book</button>
                    </div>    
                    <div class="background_shadow">
                        <div class="modal-window">
                            <div class="close">
                                <span class="close_btn">X</span>
                            </div>
                            <div class="form-create_book">
                                <form method="POST" id="addbook-form">
                                    @csrf
                                    <h4 class="form_title">Create Book</h4>
                                    <div id="errors"></div>
                                    <div class="input-create">
                                        <label for="book_name">Title</label><br>
                                        <input type="text" name="name" id="book_name">
                                    </div>
                                    <div class="input-create">
                                        <label for="book_desc">Description</label><br>
                                        <textarea name="description" id="book_desc"></textarea>
                                    </div>
                                    <div class="input-create">
                                        <label for="author_field">Author</label>
                                        <select id="author_field" name="author">
                                            @foreach ($authors as $optionAuthor)
                                                <option name="author_id" value="{{$optionAuthor->id}}" id="author_id">{{$optionAuthor->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-sm btn-outline-secondary" id="evt-create">Create</button>
                                </form>
                            </div>    
                        </div>     
                    </div>
                    <div id="success"></div>
                @endif    
            @endauth            
            <div class="row" id="result">
                <?php ob_start(); ?>
                @foreach ($books as $book)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="45%" y="50%">Picture</text></svg>
                            <div class="card-body">
                            	<h5 class="card-title">{{$book->name}}</h5>
                                <p>
                                    <span>Author:</span>
                                    <a href="{{route('authors.index', $book->author_id)}}">
                                        <span>{{$authors->find($book->author_id)["name"]}}</span>
                                    </a>
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
                <?= $html = ob_get_clean(); ?>
            </div>
            {{$books->links()}}
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#addbook-form').on('submit', createBookforAuthor);

            function createBookforAuthor (evt) {
                var $data = {};
                $('#addbook-form').find('input, select').each(function() {
                    $data[this.id] = $(this).val();
                });
                // для textarea достал отдельно, вместе почему то не заработало
                $data['book_desc'] = $('#book_desc').val();

                $.ajax({
                    url: '/books/',
                    type: 'POST',
                    data: {
                        name: $data['book_name'],
                        description: $data['book_desc'],
                        author_id: $data['author_field']
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(data) {
                        evt.preventDefault();
                        if (data.id > 0) {
                            $('.background_shadow').css('display', 'none');
                            $('.modal-window').css('display', 'none');
                            $('#result').html(`<?= $html; ?><div class="col-md-4"><div class="card mb-4 shadow-sm"><svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="45%" y="50%">Picture</text></svg><div class="card-body"><h5 class="card-title">${data.name}</h5><p><span>Author:</span><a href="/admin/authors/${data.author_id}"><span>${data.author}</span></a></p><div class="d-flex justify-content-between align-items-center"><div class="btn-group"><a href="/books/${data.id}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a><a href="/admin/books/${data.id}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a></div></div></div></div></div>`);
                            $('#success').prepend(`<div class="success_mess">${data.message}</div>`);
                            $('#errors').html('');
                            $('#book_name').val('');
                            $('#book_desc').val('');
                        } else {
                            $('#errors').prepend(`<div class="error_mess">${data.message}</div>`);
                        } 
                    },
                    error: function(msg) {
                        console.log(msg);
                    }  
                });

                return false;         
            }
        });
    </script>    

@endsection