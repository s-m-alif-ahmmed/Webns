<?php

namespace Database\Factories;

use App\Models\Admin\Faq\Faq;
use App\Models\Admin\Faq\FaqCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Faq\Faq>
 */
class FaqFactory extends Factory
{
    protected $model = Faq::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'faq_category_id' => FaqCategory::factory(),
            'question' => fake()->sentence() . '?',
            'answer' => fake()->paragraph(),
            'single_image' => 'admin/images/faq/default.jpg',
            'status' => fake()->randomElement(['active', 'deactive']),
        ];
    }
}
