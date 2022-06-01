<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostServiceTest extends TestCase
{
    protected PostService $postService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->postService = $this->app->make(PostService::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }

    public function testStoreImage()
    {

    }

    public function testStoreAll()
    {
        $data = $this->postService->storeAll([
            'user_id' => 1,
            'category_id' => 1,
            "title" => 'title',
            'slug' => 'slug',
            'image' => 'image',
            'description' => 'description'
        ]);

        $post = Post::find(1)->first();
        self::assertEquals("1", $post->user_id);
        self::assertEquals("1", $post->category_id);
        self::assertEquals("title", $post->title);
        self::assertEquals("slug", $post->slug);
        self::assertEquals("image", $post->image);
        self::assertEquals("description", $post->description);
        Post::destroy(1);
    }

    public function testDestroyImage()
    {
        // Storage::disk('public')->put('post', UploadedFile::fake()->image('testing.jpg'));
        $this->postService->storeAll([
            'user_id' => 1,
            'category_id' => 1,
            "title" => 'title',
            'slug' => 'slug',
            'image' => 'post/testing.jpg',
            'description' => 'description'
        ]);

        $this->postService->destroyImage(3);
        self::assertFalse(File::exists(public_path("storage/post/testing.jpg")));
    }

    public function testUpdateAll()
    {
        $this->postService->storeAll([
            'user_id' => 1,
            'category_id' => 1,
            "title" => 'title',
            'slug' => 'slug',
            'image' => 'image',
            'description' => 'description'
        ]);

        $this->postService->updateAll([
            'user_id' => 2,
            'category_id' => 2,
            "title" => 'title-edit',
            'slug' => 'slug-edit',
            'image' => 'image-edit',
            'description' => 'description-edit'
        ], 1);

        $post = $this->postService->getDataById(1);
        self::assertEquals("2", $post->user_id);
        self::assertEquals("2", $post->category_id);
        self::assertEquals("title-edit", $post->title);
        self::assertEquals("slug-edit", $post->slug);
        self::assertEquals("image-edit", $post->image);
        self::assertEquals("description-edit", $post->description);
        $this->postService->destroyById(1);
    }

    public function testDestroyPost()
    {
        $data = $this->postService->storeAll([
            'user_id' => 1,
            'category_id' => 1,
            "title" => 'title',
            'slug' => 'slug',
            'image' => 'image',
            'description' => 'description'
        ]);

        self::assertNotEmpty(Post::find(1)->first());
        $this->postService->destroyById(1);
        // self::assertEmpty(Post::findOrFail(1));
    }
}
