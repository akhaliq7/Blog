@extends('layouts.app')

@section('content')
    <a href="{{ url('/posts') }}" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <img style="width: 100%" src='{{ url("/storage/cover_images/{$post->cover_image}") }}' alt="">
        </div>
    </div>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href='{{ url("/posts/{$post->id}/edit") }}' class="btn btn-default">Edit</a>
            {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection
