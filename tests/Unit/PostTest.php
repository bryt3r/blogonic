<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;


class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_a_user_can_create_post(): void
    {
        $user = $this->createUser();
        $this->actingAs($user)->post('/post', [
            'content' => 'my new post for a test application post',
            'slug' => Str::slug(substr('my new post for a test application post', 0, 15)) . uniqid('-'),
            'user_id' => $user->id,
        ]);
        $post = Post::latest()->first();

        $this->assertDatabaseHas('posts', ['content' => $post->content]);
    }


    private function createUser(): User
    {
        return User::factory()->create();
    }
}
