@extends('layouts')

@section('content')

<div class="container">
	<h3>{{$book->name}}</h3>
	<p>{{$book->description}}</p>
</div>

@endsection