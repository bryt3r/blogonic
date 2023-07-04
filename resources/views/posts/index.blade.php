@extends('posts.layout')


@section('page_content')

    
        @if (count($posts) < 1)

            'NO POSTS'
        @else 
            <div id="posts_wrapper" class = "flex flex_col align_ctr"> 
                @foreach ($posts as $post)
                    <div class="post_box white_border flex flex_col justify_btw"> 
                        <a href="{{route('post.show', ['slug' => $post->slug])}}">
                            {{ Str::limit( $post->title, '100' ) }}
                        </a>
                        <div class="flex flex_row justify_arnd">
                            <div class="post_box_icon white_border"> {{$post->comments->count()}} Comments </div>
                            <div class="post_box_icon white_border"> 4 <i class="fa-solid fa-thumbs-up"></i> </div>
                        </div>   
                    </div>
                @endforeach
            </div> 
            
            <div>
                {{-- {{ $posts->links() }} --}}
            </div>

        @endif


     

@endsection