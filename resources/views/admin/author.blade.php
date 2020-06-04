@extends('admin.layouts.app_admin')

@section('content')

@include('admin.layouts.section_author')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="add_book-btn">
                <button class="btn btn-sm btn-outline-secondary" id="evt-modal">+ Add Book</button>
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
            <div id="success"></div>
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
                                    <span><strong class="author_name">{{$author->name}}</strong></span>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('books.index', $book->id)}}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </a>
                                        <a href="{{route('book.show', $book->id)}}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <?= $html = ob_get_clean(); ?>    
            </div>
        </div>
    </div>

<script type="text/javascript">

    $(document).ready(function() {

        $('#evt-create').on('click', createBookforAuthor);

        function createBookforAuthor () {
            var bookName = $('#book_name').val();
            var bookDesc = $('#book_desc').val();
            var authorId = $('#author_id').val();
            console.log(bookName);
            console.log(bookDesc);
            console.log(authorId);

            $.ajax({
                url: '{{route('book.store')}}',
                type: 'POST',
                data: {
                    name: bookName,
                    description: bookDesc,
                    author_id: authorId
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(data) {
                    if (data.id > 0) {
                        $('.background_shadow').css('display', 'none');
                        $('.modal-window').css('display', 'none');
                        $('#result').html(`<?= $html; ?><div class="col-md-4"><div class="card mb-4 shadow-sm"><svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="45%" y="50%">Picture</text></svg><div class="card-body"><h5 class="card-title">${data.name}</h5><p><span>Author:</span>
                                    <span><strong>${data.author}</strong></span></p><div class="d-flex justify-content-between align-items-center"><div class="btn-group">
                                        <a href="/books/${data.id}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a><a href="/admin/books/${data.id}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a></div></div></div></div></div>`);
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
        }

    });
    
</script>

@endsection