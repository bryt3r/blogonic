@extends('posts.layout')


@section('page_content')


    
        <div> {{$post->title}} </div>
        <div> {{$post->likes->count()}} </div>
        @foreach ($post->comments as $comment)
            <div> {{$comment->content}} </div>
        @endforeach

    
    
@endsection