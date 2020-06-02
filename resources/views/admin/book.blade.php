@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h4>{{$book->name}}</h4>
        <p>
        	{{$book->description}}
        </p>
    </div>
@endsection