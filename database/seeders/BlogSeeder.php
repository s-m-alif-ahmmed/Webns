<?php

namespace Database\Seeders;

use App\Models\Admin\Blog\Blog;
use App\Models\Admin\Blog\Category;
use App\Models\Admin\Blog\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();
        $categories = Category::all();
        $tags = Tag::all();

        if ($categories->isEmpty()) {
            $categories = Category::factory(3)->create();
        }

        if ($tags->isEmpty()) {
            $tags = Tag::factory(5)->create();
        }

        foreach ($categories as $category) {
            $blogs = Blog::factory(3)->create([
                'user_id' => $user->id,
                'category_id' => $category->id,
            ]);

            foreach ($blogs as $blog) {
                // Attach random 2-3 tags
                $blog->tags()->sync($tags->random(rand(2, 3))->pluck('id')->toArray());
            }
        }
    }
}
