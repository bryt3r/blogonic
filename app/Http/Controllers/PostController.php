<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('comments', 'likes')->latest()->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $slug = Str::slug(substr($request->content, 0, 15)) . uniqid('-');
        $post = new Post;
        $post->content = $request->content;
        $post->slug = $slug;
        $post->user_id = $request->user()->id;
        // return $post;
        $post->save();

        return back()->with('success', 'post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::with('comments', 'likes')->where('slug', $slug)->firstOrFail();
        // return $post;
        return view('posts.post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function add_comment(StoreCommentRequest $request, String $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->user_id = $request->user()->id;
        $comment->post_id = $post->id;
        $comment->save();


        return back();
    }


    public function like_post(Request $request, String $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $like = new Like;
        $like->post_id = $post->id;
        $like->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
