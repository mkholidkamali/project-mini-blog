<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'kholid',
            'email' => 'testing@testing.com',
            // 'password' => Crypt::encrypt("password")
            'password' => bcrypt("password")
        ]);

        Category::create([
            'name' => 'Laravel'
        ]);
        Category::create([
            'name' => 'Bootstrap'
        ]);
        Category::create([
            'name' => 'Git'
        ]);
    }
}
