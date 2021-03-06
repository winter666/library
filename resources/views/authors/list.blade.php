@extends('layouts')

@section('content')

@include('layouts.section')

<div class="container">
    @auth
        @if (Auth::user()->is_admin) 
            <div class="add_book-btn">
                <button class="btn btn-sm btn-outline-secondary" id="evt-modal">Add Author</button>
            </div>    
            <div class="background_shadow">
                <div class="modal-window">
                    <div class="close">
                        <span class="close_btn">X</span>
                    </div>
                    <div class="form-create_book">
                        <div>
                            <h4 class="form_title">Create Author</h4>
                            <div id="errors"></div>
                            <div class="input-create">
                                <label for="author_name">Name</label><br>
                                <input type="text" name="name" id="author_name">
                            </div>
                            <button class="btn btn-sm btn-outline-secondary" id="evt-create">Add</button>
                        </div>
                    </div>    
                </div>     
            </div>
            <div id="success"></div>
        @endif
    @endauth        
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Количество книг</th>
                @auth
                    @if (Auth::user()->is_admin)
                        <th scope="col"></th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody id="result">
            <?php ob_start(); ?>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{$author->id}}</th>
                    <td><a href="{{route('authors.index', $author->id)}}">{{$author->name}}</a></td>
                    <td>{{count($books[$author->id])}}</td>
                    @auth
                        @if (Auth::user()->is_admin)
                            <td><a href="{{route('author.show', $author->id)}}" class="btn btn-primary">Edit</a></td>
                        @endif
                    @endauth                    
                </tr>
            @endforeach
            <?= $html = ob_get_clean(); ?>
        </tbody>
    </table>
    {{$authors->links()}}
</div> 
<script type="text/javascript">
$(function() {

    $('#evt-create').on('click', addAuthor);

    function addAuthor(evt){

        var author_name = $('#author_name').val();

        $.ajax({
            url: '{{ route('author.store') }}',
            type: "POST",
            data: {
                name: author_name
            },
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function (data) {
                if (data.id > 0) {
                    $('.background_shadow').css('display', 'none');
                    $('.modal-window').css('display', 'none');
                    $('#result').html(`<?= $html; ?><th scope="row">${data.id}</th><td><a href="/authors/${data.id}">${data.name}</a></td><td>0</td><td><a href="/admin/authors/${data.id}" class="btn btn-primary">Edit</a></td>`);
                    $('#success').prepend(`<div class="success_mess">${data.message}</div>`);
                    $('#errors').html('');
                    $('#author_name').val('');
                } else {
                    $('#errors').prepend(`<div class="error_mess">${data.message}</div>`);
                }    
            },
            error: function (msg) {
                console.log('Ошибка '+msg);
            }
        });   
    }    
});
</script>

@endsection