<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ config('app.name', 'My Books') }}</h1>
        <h2>
            <strong>(Books by <span class="author_name">{{$author->name}}</span>)</strong>    
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
        </div>
       <div class="add_book-btn">
            <button class="btn btn-sm btn-outline-secondary" id="evt-modal_edit">Edit Author</button>
        </div>    
        <div class="background_shadow" id="edit_background">
            <div class="modal-window" id="edit_modal">
                <div class="close">
                    <span class="pointer" id="close_edit">X</span>
                </div>
                <div class="form-create_book">
                    <form method="POST" id="update_form">
                        @csrf
                        <h4 class="form_title">Update Author</h4>
                        <div id="errors_update"></div>
                        <div class="input-create">
                            <label for="author_name">Name</label><br>
                            <input type="text" name="name" id="author_name" value="{{$author->name}}">
                        </div>
                        <button class="btn btn-sm btn-outline-secondary" id="evt-update">Save</button>
                    </form>
                </div>    
            </div>     
        </div>
        <div id="success_update"></div>          
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#evt-modal_edit').on('click', showEditModal);
            $('#close_edit').on('click', showEditModal);
            $('#update_form').on('submit', updateAuthor);

            function showEditModal () {
                $('#edit_background').toggle('display');
                $('#edit_modal').toggle('display');
            }

            function updateAuthor (evt) {
                var authorName = $('#author_name').val();
                $.ajax({
                    url: '{{route('author.update', $author->id)}}',
                    type: 'POST',
                    data: {name: authorName},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.id > 0) {
                            $('.author_name').html(data.name);
                            $('#edit_background').css('display', 'none');
                            $('#edit_modal').css('display', 'none');
                            $('#success_update').html(`<div class="success_mess">${data.message}</div>`);
                        } else {
                            $('#errors_update').html(`<div class="error_mess">${data.message}</div>`);
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
</section>