<?php

namespace Database\Factories;

use App\Models\Admin\Blog\Blog;
use App\Models\Admin\Blog\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Blog\Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'language' => fake()->randomElement(['english', 'bangla']),
            'meta_title' => $title,
            'meta_description' => fake()->paragraph(),
            'image' => 'admin/images/blog/default.jpg',
            'alt' => fake()->word(),
            'title' => $title,
            'short_description' => fake()->paragraph(),
            'description' => fake()->paragraphs(3, true),
            'slug' => Str::slug($title, '-'),
            'popular_status' => fake()->randomElement(['active', 'inActive']),
            'status' => fake()->randomElement(['Publish', 'Unpublish']),
        ];
    }
}
