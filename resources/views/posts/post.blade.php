@extends('posts.layout')


@section('page_content')

    <div class="dash_back_icon" onclick="location.href='{{ route('posts') }}';"> <i class="fa-solid fa-arrow-left fa-2x"></i> </div>

    <div id="post_wrapper" class="flex flex_col align_ctr">

        <div class="post_box white_border flex flex_col justify_btw"> 
            <div>
                <div>{{  $post->title }}</div>
                <hr>
                <div>{{  $post->content }}</div>
                
            </div> 
            
            <div class="flex flex_row justify_arnd">
                <div class="post_box_icon white_border"> {{$post->comments->count()}} Comments </div>
                <div class="post_box_icon white_border"> {{$post->likes->count()}} <i class="fa-solid fa-thumbs-up"></i> </div>
            </div>   
        </div>
        <div id="comments_wrapper" class="margin_ctr">
            @foreach ($post->comments as $comment)
                <div class="comment_box margin_ctr"> 
                    {{$comment->content}} 
                </div>
            @endforeach
        </div>


    </div>
   
    
@endsection