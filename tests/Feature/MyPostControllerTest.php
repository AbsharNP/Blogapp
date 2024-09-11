<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class MyPostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = User::factory()->create();

        $post1 = Post::factory()->create(['username' => $user->name]);
        $post2 = Post::factory()->create(['username' => $user->name]);

        $response = $this->actingAs($user)->get('/mypost'); 

        $response->assertStatus(200);

        $response->assertViewIs('mypost');

        $response->assertViewHas('posts', function ($posts) use ($post1, $post2) {
            return $posts->contains($post1) && $posts->contains($post2);
        });
    }

    public function testUpdatePost()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create(['username' => $user->name]);

        $file = UploadedFile::fake()->image('post.jpg');

        $response = $this->actingAs($user)->post("/update_post/{$post->id}", [
            'title' => 'Updated Title',
            'content' => 'Updated Content',
            'image' => $file,
        ]);

        $response->assertRedirect('/mypost');

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'content' => 'Updated Content',
        ]);
    }

    public function testRemovePost()
    {
        
        $user = User::factory()->create();

        $post = Post::factory()->create(['username' => $user->name]);

        $response = $this->actingAs($user)->get("/delete/{$post->id}");

        $response->assertRedirect();

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }


    public function test_index_redirects_unauthenticated_users()
    {
        $response = $this->get(route('mypost'));

        $response->assertRedirect(route('login'));
    }

    
    public function test_index_shows_posts_for_authenticated_users()
    {
        $user = User::factory()->create();

        Post::factory()->create([
            'username' => $user->name,
        ]);

        $response = $this->actingAs($user)->get(route('mypost'));

        $response->assertStatus(200);

        $response->assertViewHas('posts', function ($posts) use ($user) {
            return $posts->first()->username === $user->name;
        });
    }

}
