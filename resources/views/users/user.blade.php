@extends('posts.layout')


@section('page_content')

    <div class="profile_wrapper flex flex_col align_ctr">
    <div id="back_icon" onclick="location.href='{{ URL::Previous() }}';"> <i class="fa-solid fa-arrow-left "></i> </div>

        <div class="profile_image">
            <i class="fa-solid fa-user fa-10x"></i>
        </div>
        <div>
            <p>Name: {{ucwords($user->name)}} </p> 
            <p>Username: ({{$user->username}}) </p>
        </div>
        <div class="user_stats flex flex_col margin_ctr align_ctr">
            <div class="flex flex_row justify_btw stat_box white_border">
               <span>Posts</span> <span>{{$user->posts->count()}} </span>
            </div>
            <div class="flex flex_row justify_btw stat_box white_border">
                <span>Comments</span> <span>{{$user->comments->count()}} </span>
            </div>
            <div class="flex flex_row justify_btw stat_box white_border">
                <span>Likes</span> <span>{{$user->likes->count()}} </span>
            </div>
        </div>
    </div>


@endsection