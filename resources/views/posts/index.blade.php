@extends('posts.layout')


@section('page_content')

<a id="modal_open_btn" class="floating_icon white_border" href="#"><i class="fa-solid fa-pencil fa-2x"></i></a>
<div id="posts_wrapper" class = "flex flex_col align_ctr"> 
        @if (count($posts) < 1)

            'NO POSTS'
            
        @else 
            
                @foreach ($posts as $post)
                    <div class="post_box flex flex_row justify_arnd"  > 
                        <div class="user_avatar">
                            <a href="{{route('view_user', ['username' =>  $post->user->username])}}">
                            {{$post->user->initials()}}
                            </a>
                        </div>
                        <div class="post_box_body flex flex_row justify_arnd">
                            <div class="content_wrapper">
                                <div class="post_info flex justify_arnd"><span> <a href="{{route('view_user', ['username' =>  $post->user->username])}}">{{$post->user->username}}</a></span> <span> posted: {{date_format($post->created_at, "d M, Y")}}</span></div>
                               
                                <div class="content_box" onclick="location.href='{{ route('post.show', ['slug' => $post->slug]) }}';">
                                    {{ Str::limit( $post->content, '120' ) }}
                                </div>    
                            </div>
                            <div class="post_box_icons flex flex_col justify_arnd">
                                <div class="post_box_icon  flex justify_btw align_ctr"> <i class="fa-regular fa-comment"></i> {{$post->comments->count()}} </div>
                                
                                @if ($post->liked())
                                    <form method="POST" action="{{ route('post.like', ['slug' => $post->slug]) }}">
                                        @csrf
                                        <button class="post_box_icon liked flex justify_btw align_ctr" type="submit">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                            {{$post->likes->count()}}
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('post.like', ['slug' => $post->slug]) }}">
                                        @csrf
                                        <button class="post_box_icon flex justify_btw align_ctr" type="submit">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                            {{$post->likes->count()}}
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </div>   
                    </div>
                @endforeach


                <div id="modal" class="modal @error('content') show_modal @enderror">
                    <div id="modal_content" class="flex flex_col align_ctr ">
                        <span id="modal_close_btn"><i class="fa-solid fa-xmark fa-2x"></i></span>
                        <p class=" ">Make A Post</p>
                        <div id="comment_form" class="comment_form">
                            <form class="flex flex_col" action="{{route('post.store')}}" method="POST">
                                @csrf
                                @error('content')
                                    <small class="notification_error notification_bar"> **{{$message}} </small>
                                @enderror
                                <textarea name="content" id="content" cols="30" rows="10" placeholder="post a comment"> </textarea>
                                
                                <button type="submit">POST</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div> 

           
            <div>
                {{ $posts->links() }}
            </div>

        @endif


     

@endsection