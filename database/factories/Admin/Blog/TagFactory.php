<?php

namespace Database\Factories\Admin\Blog;

use App\Models\Admin\Blog\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Blog\Tag>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'status' => fake()->randomElement(['active', 'deactive']),
        ];
    }
}
