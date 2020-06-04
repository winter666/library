@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <div class="detail_content">
        <div id="success"></div>
        <h2 class="title" id="book_name">{{$book->name}}</h2>
        <div class="detal_author">
            <span>Author:</span>
            <a id="author_link" href="{{route('authors.index', $author->id)}}" class="author_detail">
                <span class="author_value" id="author_name">{{$author->name}}</span>
            </a>
        </div>
        <div>
            <h4>Description:</h4>
            <p class="detail_desc" id="book_desc">{{$book->description}}</p>
            <div>
                <form action="{{ URL::route('book.destroy', $book->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="btn btn-sm btn-outline-secondary" id="evt-del" data-book_id="{{$book->id}}" data-route="/admin/books/{{$book->id}}">Delete</button>
                </form>
            </div>
            <div class="update_book-btn">
                <button class="btn btn-sm btn-outline-secondary" id="evt-modal">Update Book</button>
            </div>    
            <div class="background_shadow">
                <div class="modal-window">
                    <div class="close">
                        <span class="close_btn">X</span>
                    </div>
                    <div class="form-create_book">
                        <form method="POST" id="updatebook-form">
                            @csrf
                            <h4 class="form_title">Update Book for {{$author->name}}</h4>
                            <div id="errors"></div>
                            <div class="input-create">
                                <label for="form_book-name">Title</label><br>
                                <input type="text" name="name" id="form_book-name" value="{{$book->name}}">
                            </div>
                            <div class="input-create">
                                <label for="form_book-desc">Description</label><br>
                                <textarea name="description" id="form_book-desc">{{$book->description}}</textarea>
                                <label><input type="checkbox" id="is_old_desc"> Keep the old description*</label>
                                <div>
                                    <span>*if you need return old description</span>
                                </div>
                                <input type="hidden" name="desc_old" id="book_desc_old" value="{{$book->description}}">
                            </div>
                            <div class="input-create">
                                <select id="form_author-id" name="author">
                                    @foreach ($authors as $optionAuthor)
                                        @if ($optionAuthor->id == $author->id)
                                            <option value="{{$optionAuthor->id}}" selected="selected">{{$optionAuthor->name}}</option>
                                        @else
                                            <option value="{{$optionAuthor->id}}">{{$optionAuthor->name}}</option>
                                       @endif
                                    @endforeach
                                </select>
                            </div>     
                            <button class="btn btn-sm btn-outline-secondary" id="evt-update">Update</button>
                        </form>
                    </div>    
                </div>     
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('#updatebook-form').on('submit', createBookforAuthor);

        function createBookforAuthor (evt) {
            var $data = {};
            $('#updatebook-form').find('input, select').each(function() {
                $data[this.id] = $(this).val();
            });
            $data['form_book-desc'] = $('#form_book-desc').val();

            if ($('#is_old_desc').is(':checked')) {
                $data['form_book-desc'] = $('#book_desc_old').val();
            } else {
                $data['form_book-desc'] = $('#form_book-desc').val();
            }

            $.ajax({
                url: '{{route('book.update', $book->id)}}',
                type: 'POST',
                data: {
                    name: $data['form_book-name'],
                    description: $data['form_book-desc'],
                    author_id: $data['form_author-id']
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
                        $('#book_name').html(data.name);
                        $('#book_desc').html(data.description);
                        $('#author_name').html(data.author);
                        $('#author_link').attr('href', `/authors/${data.author_id}`);
                        $('#success').html(`<h3 class="success_mess">${data.message}</h3>`);
                        $('#errors').html('');
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