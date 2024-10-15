<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogResourceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create());
    }

    public function test_can_view_blog_index()
    {
        $response = $this->get('/admin/blogs');
        $response->assertStatus(200);
    }

    public function test_can_create_blog()
    {
        $blogData = [
            'title' => 'Test Blog',
            'slug' => 'test-blog',
            'content' => 'This is a test blog content.',
        ];

        $response = $this->post('/admin/blogs', $blogData);
        $response->assertRedirect('/admin/blogs');

        $this->assertDatabaseHas('blogs', $blogData);
    }

    public function test_can_update_blog()
    {
        $blog = Blog::factory()->create();
        $updatedData = [
            'title' => 'Updated Blog Title',
            'slug' => 'updated-blog-slug',
            'content' => 'This is the updated content.',
        ];

        $response = $this->put("/admin/blogs/{$blog->id}", $updatedData);
        $response->assertRedirect('/admin/blogs');

        $this->assertDatabaseHas('blogs', $updatedData);
    }

    public function test_can_delete_blog()
    {
        $blog = Blog::factory()->create();

        $response = $this->delete("/admin/blogs/{$blog->id}");
        $response->assertRedirect('/admin/blogs');

        $this->assertDatabaseMissing('blogs', ['id' => $blog->id]);
    }
}
