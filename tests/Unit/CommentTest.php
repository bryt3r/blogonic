<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;


class CommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_a_user_can_comment_on_a_post(): void
    {
        $user = $this->createUser();

        $this->actingAs($user)->post('/post', [
            'content' => 'my new post for a test application post',
            'slug' => Str::slug(substr('my new post for a test application post', 0, 15)) . uniqid('-'),
            'user_id' => $user->id,
        ]);
       
        $post = Post::latest()->first();

        $this->actingAs($user)->post('/posts/'.$post->slug.'/comment', [
            'content' => 'my new comment for a test application',
            'user_id' => $user->id,
            'post' => $post->id,
        ]);

       
        $comment = Comment::latest()->first();

        $this->assertDatabaseHas('comments', ['content' => $comment->content]);
    }


    private function createUser(): User
    {
        return User::factory()->create();
    }
}
