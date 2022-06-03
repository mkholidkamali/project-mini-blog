<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function __construct(
        public PostService $postService
    ){}

    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('dashboard.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "title" => ['required', 'max:30', 'unique:posts'],
            'category_id' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'description' => ['required']
        ], [
            "title.required"  => 'Title tidak boleh kosong',
            "category_id.required"  => 'Category tidak boleh kosong',
            "image.required"  => 'Image tidak boleh kosong',
            "description.required"  => 'Description tidak boleh kosong'
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::id();

        $imagePath = $this->postService->storeImage($request);
        $data['image'] = $imagePath;

        $this->postService->storeAll($data);

        return response()
        ->redirectTo('/dashboard')
        ->with('message', "Berhasil <strong>Membuat</strong> post (⌐■_■)");
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        return view('dashboard.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        // Validasi
        $data = $this->validate($request, [
            "title" => ['required', 'max:30', 'unique:posts'],
            'category_id' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'description' => ['required']
        ], [
            "title.required"  => 'Title tidak boleh kosong',
            "category_id.required"  => 'Category tidak boleh kosong',
            "image.required"  => 'Image tidak boleh kosong',
            "description.required"  => 'Description tidak boleh kosong'
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::id();

        // Destroy Old Image
        $this->postService->destroyImage($post->id);

        // Save Image
        $imagePath = $this->postService->storeImage($request);
        $data['image'] = $imagePath;

        // Update Data
        $this->postService->updateAll($data, $post->id);

        return response()
        ->redirectTo('/dashboard')
        ->with('message', "Berhasil <strong>Mengupdate</strong> post ༼ つ ◕_◕ ༽つ");
    }
    
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $this->postService->destroyById($post->id);

        return response()
        ->redirectTo('/dashboard')
        ->with('message', "Berhasil <strong>Menghapus</strong> post (☞ﾟヮﾟ)☞");
    }
}