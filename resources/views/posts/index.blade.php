@extends('posts.layout')


@section('page_content')

    
        @if (count($posts) < 1)

            'NO POSTS'
        @else 
            <div id="posts_wrapper" class = "flex flex_col align_ctr"> 
                @foreach ($posts as $post)
                    <div class="post_box flex flex_row justify_arnd" onclick="location.href='{{ route('post.show', ['slug' => $post->slug]) }}';" > 
                        <div class="user_avatar">{{$post->user->initials()}}</div>
                        <div class="post_box_body flex flex_row justify_arnd">
                            <div class="content_wrapper">
                                <div class="post_info flex justify_arnd"><span>{{$post->user->name}}</span> <span> {{date_format($post->created_at, "d M, Y")}}</span></div>
                               
                                <div class="content_box">{{ Str::limit( $post->content, '160' ) }}</div>    
                            </div>
                            <div class="post_box_icons flex flex_col justify_arnd">
                                <div class="post_box_icon white_border flex justify_btw align_ctr"> <i class="fa-regular fa-comment"></i> {{$post->comments->count()}} </div>
                                <div class="post_box_icon white_border flex justify_btw align_ctr"> <i class="fa-solid fa-thumbs-up"></i> {{$post->likes->count()}} </div>
                            </div>
                        </div>   
                    </div>
                @endforeach
            </div> 
            
            <div>
                {{-- {{ $posts->links() }} --}}
            </div>

        @endif


     

@endsection