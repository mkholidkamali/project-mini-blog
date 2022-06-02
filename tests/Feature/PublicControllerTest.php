<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PublicControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Post::truncate();
    }

    public function testIndex()
    {
        $this->get('/')
            ->assertSeeText('Mini Blog')
            ->assertSeeText('Login')
            ->assertSeeText('Made by');
    }

    public function testShow()
    {
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->post('/d/store', [
            'title' => 'judul',
            'category_id' => '1',
            'image' => UploadedFile::fake()->image('testing.jpg'),
            'description' => 'description' 
        ]);

        $this->get('/post/judul/show')
            ->assertSeeText('Back')
            ->assertSeeText('description')
            ->assertSeeText('judul')
            ->assertSeeText('Made by');
    }

    public function testCategoryIndex()
    {
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->post('/d/store', [
            'title' => 'judul',
            'category_id' => '1',
            'image' => UploadedFile::fake()->image('testing.jpg'),
            'description' => 'description' 
        ]);

        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->post('/d/store', [
            'title' => 'judul',
            'category_id' => '1',
            'image' => UploadedFile::fake()->image('testing.jpg'),
            'description' => 'description' 
        ]);

        $this->get('/p/category/Laravel')
            ->assertSeeText('Mini Blog')
            ->assertSeeText('Dashboard')
            ->assertSeeText('judul')
            ->assertSeeText('Laravel')
            ->assertSeeText('Made by');
    }
}
