<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('comments', 'likes')->paginate(10);
        return view('posts.index');
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
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->content,
            'user_id' => $request->user()->id,
        ]);

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->with('comments', 'likes')->get();
        return $post;
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
        Comment::create([
            'content' => $request->content,
             'user_id' => $request->user()->id,
             'post_id' => $post->id,
            ]);
            

        return back();
    }


    public function like_post(Request $request, String $slug)
    {
        $post = Post::where('slug', $slug)->first();
        Like::create([
            'post_id' => $post->id,
        ]);

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
