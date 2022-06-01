<?php 

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

interface PostService {
    public function getDataById(int $id): Post;
    public function storeImage(Request $request): string|false;
    public function storeAll(array $data);
    public function destroyImage(int $id);
    public function updateAll(array $data, int $id);
    public function destroyById(int $id);
}