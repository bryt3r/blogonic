@extends('posts.layout')


@section('page_content')


    @if (count($posts) < 1)

        'NO POSTS'
    @else 
    
        @foreach ($posts as $post)
            <div> 
             <a href="{{route('post.show', ['slug' => $post->slug])}}">{{$post->title}}</a>   
             </div>
        @endforeach

    @endif
    
@endsection