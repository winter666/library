@extends('layouts')

@section('content')

<div class="container">
    <div class="detail_content">
        <h2 class="title">{{$book->name}}</h2>
        <div class="detal_author">
        	<span>Author:</span>
        	<a href="#" class="author_detail">
        		<span class="author_value"></span>
        	</a>
        </div>
        <div>
            <h4>Description:</h4>
            <p class="detail_desc">{{$book->description}}</p>
        </div>
    </div>    
</div>

@endsection