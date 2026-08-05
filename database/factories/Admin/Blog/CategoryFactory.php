<?php

namespace Database\Factories\Admin\Blog;

use App\Models\Admin\Blog\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Blog\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'status' => fake()->randomElement(['active', 'deactive']),
        ];
    }
}
