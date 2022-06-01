<?php 

namespace App\Services\Impl;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostServiceImpl implements PostService {
    public function getDataById(int $id): Post
    {
        return Post::find($id)->first();
    }

    public function storeImage(Request $request): string|false
    {
        $name = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('/post', $name);
        return $imagePath;
    }

    public function storeAll(array $data)
    {
        Post::create($data);
    }

    public function updateAll(array $data, int $id)
    {
        Post::where('id', $id)->update($data);
    }

    public function destroyImage(int $id)
    {
        $post = $this->getDataById($id);
        $imagePath = public_path("storage/" . $post->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }

    public function destroyById(int $id)
    {
        Post::destroy($id);
    }
}