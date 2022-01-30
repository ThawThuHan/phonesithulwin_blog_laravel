<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

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
        Post::factory()->count(20)->create();
        Category::factory()->count(5)->create();
        Book::factory()->count(3)->create();
    }
}
