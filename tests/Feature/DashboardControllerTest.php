<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Post::truncate();
    }

    public function testIndex()
    {
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->get('/dashboard')
            ->assertSeeText('Mini-Blog')
            ->assertSeeText('Your Post')
            ->assertSeeText('Create');
    }

    public function testCreate()
    {
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->get('/d/create')
            ->assertSeeText('Mini-Blog')
            ->assertSeeText('New Post')
            ->assertSeeText('Description');
    }

    public function testStoreSuccess()
    {
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->post('/d/store', [
            'title' => 'judul',
            'category_id' => '1',
            'image' => UploadedFile::fake()->image('testing.jpg'),
            'description' => 'description' 
        ])
        ->assertRedirect('/dashboard')
        ->assertSessionHas('message', "Berhasil <strong>Membuat</strong> post (⌐■_■)");
    }
    
    public function testStoreValidationError()
    {
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
            ])->post('/d/store', [
            'title' => null,
            'category_id' => null,
            'image' => null,
            'description' => null 
            ])
        ->assertRedirect('/');
    }

    public function testEdit()
    {
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->get('/d/1/edit')
        ->assertSeeText('Update Post')
        ->assertSeeText('Title')
        ->assertSeeText('UPDATE');
    }

    public function testUpdateSuccess()
    {
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->post('/d/store', [
            'title' => 'judul',
            'category_id' => '1',
            'image' => UploadedFile::fake()->image('testing.jpg'),
            'description' => 'description' 
        ])
        ->assertRedirect('/dashboard')
        ->assertSessionHas('message', "Berhasil <strong>Membuat</strong> post (⌐■_■)");
        
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
            ])->patch('/d/judul/update', [
                'title' => 'judul update',
                'category_id' => '2',
                'image' => UploadedFile::fake()->image('update.jpg'),
                'description' => 'description update' 
            ])
            ->assertRedirect('/dashboard')
            ->assertSessionHas('message', "Berhasil <strong>Mengupdate</strong> post ༼ つ ◕_◕ ༽つ");
    }

    public function testUpdateValidationError()
    {
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->post('/d/store', [
            'title' => 'judul',
            'category_id' => '1',
            'image' => UploadedFile::fake()->image('testing.jpg'),
            'description' => 'description' 
        ])
        ->assertRedirect('/dashboard')
        ->assertSessionHas('message', "Berhasil <strong>Membuat</strong> post (⌐■_■)");
        
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->patch('/d/judul/update', [
            'title' => null,
            'category_id' => null,
            'image' => null,
            'description' => null 
        ])
        ->assertRedirect('/');
    }

    public function testDestroy()
    {
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->post('/d/store', [
            'title' => 'judul',
            'category_id' => '1',
            'image' => UploadedFile::fake()->image('testing.jpg'),
            'description' => 'description' 
        ])
        ->assertRedirect('/dashboard')
        ->assertSessionHas('message', "Berhasil <strong>Membuat</strong> post (⌐■_■)");
        
        $this->withSession([
            'login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d' => 1
        ])->delete('/d/judul/destroy')
        ->assertRedirect('/dashboard')
        ->assertSessionHas('message', "Berhasil <strong>Menghapus</strong> post (☞ﾟヮﾟ)☞");
    }
}
