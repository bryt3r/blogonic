@extends('posts.layout')


@section('page_content')

    <div id="post_wrapper" class="flex flex_col align_ctr">

        <div id="back_icon" onclick="location.href='{{ route('posts') }}';"> <i class="fa-solid fa-arrow-left "></i> </div>

        <div class="post_box flex flex_row justify_arnd" > 
            <div class="user_avatar">{{$post->user->initials()}}</div>
            <div class="post_box_body flex flex_col justify_arnd">
                <div class="content_wrapper">
                    <div class="post_info flex justify_arnd"><span>{{$post->user->name}}</span> <span> {{date_format($post->created_at, "d M, Y")}}</span></div>                 
                    <div class="content_box">{{  $post->content }}</div>    
                </div>
                <div class="post_box_icons flex flex_row justify_arnd">
                    <div class="post_box_icon flex justify_btw align_ctr"> <i class="fa-regular fa-comment"></i> {{$post->comments->count()}} </div>
                    {{-- <div class="post_box_icon flex justify_btw align_ctr">
                         <i class="fa-solid fa-thumbs-up"></i> {{$post->likes->count()}}
                    </div> --}}
                    <form method="POST" action="{{ route('post.like', ['slug' => $post->slug]) }}">
                        @csrf
                        <button class="post_box_icon flex justify_btw align_ctr" type="submit"> <i class="fa-solid fa-thumbs-up"></i> {{$post->likes->count()}}</button>
                    </form>
                    <div class="post_box_icon flex justify_btw align_ctr" onclick="location.href='#comment_form';"> 
                        <i class="fa-solid fa-reply"></i> Reply 
                    </div>
                </div>
            </div>   
        </div>
        <div id="comments_wrapper" class="margin_ctr">
            @foreach ($post->comments as $comment)
                <div class="comment_box flex flex_row justify_arnd margin_ctr">
                    <div class="user_avatar">{{$comment->user->initials()}}</div>
                    <div class="content_wrapper">
                        <div class="post_info flex justify_arnd"><span>{{$comment->user->name}}</span> <span> {{date_format($comment->created_at, "d M, Y")}}</span></div>
                    
                        <div class="content_box">{{  $comment->content }}</div>    
                    </div>
                </div>
            @endforeach
        </div>

        <div id="comment_form" class="comment_form">
            <form class="flex flex_col" action="{{route('post.add_comment', ['slug' => $post->slug])}}" method="POST">
                @csrf
                <textarea name="content" id="content" cols="30" rows="10" placeholder="post a comment"> </textarea>
                <button type="submit">POST</button>
            </form>
        </div>

    </div>
   
    
@endsection