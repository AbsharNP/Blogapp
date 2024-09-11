<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_add_post_with_title_content_and_image()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/add_post', [
            'title' => 'Test Post Title',
            'content' => 'This is the content of the post.',
            'image' => UploadedFile::fake()->image('post-image.jpg'),
        ]);

        $response->assertRedirect('viewpost');
        $response->assertSessionHas('message', 'Post added successfully');

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post Title',
            'content' => 'This is the content of the post.',
            'poststatus' => 'active',
            'user_id' => $user->id,
            'username' => $user->name,
            
        ]);

    }

    /** @test */
    public function user_can_add_post_without_image()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/add_post', [
            'title' => 'Test Post Title Without Image',
            'content' => 'This is the content of the post without image.',
        ]);

        $response->assertRedirect('viewpost');
        $response->assertSessionHas('message', 'Post added successfully');

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post Title Without Image',
            'content' => 'This is the content of the post without image.',
            'poststatus' => 'active',
            'user_id' => $user->id,
            'username' => $user->name,
            'image' => null,
        ]);
    }

    /** @test */
    public function adding_post_with_missing_title_should_fail()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/add_post', [
            'content' => 'This is the content of the post with missing title.',
        ]);

        $response->assertRedirect('addpost');
        $response->assertSessionHas('error', 'An error occurred while adding the post. Please try again.');
    }

    /** @test */
    public function adding_post_with_missing_content_should_fail()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/add_post', [
            'title' => 'Test Post Title with Missing Content',
        ]);

        $response->assertRedirect('addpost');
        $response->assertSessionHas('error', 'An error occurred while adding the post. Please try again.');
    }

    public function testIndex()
    {
        
    $post1 = Post::factory()->create();
    $post2 = Post::factory()->create();

    $response = $this->get(route('viewpost'));  

   
    $response->assertStatus(200);

    
    $response->assertViewIs('viewpost');

    
    $response->assertViewHas('posts', function ($posts) use ($post1, $post2) {
        return $posts->contains($post1) && $posts->contains($post2);
    });
    }
}
