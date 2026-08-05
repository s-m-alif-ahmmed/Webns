<?php

namespace Database\Factories\Admin\Faq;

use App\Models\Admin\Faq\FaqCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Faq\FaqCategory>
 */
class FaqCategoryFactory extends Factory
{
    protected $model = FaqCategory::class;

    public function definition(): array
    {
        return [
            'english' => fake()->word() . ' General Questions',
            'bangla' => 'সাধারণ প্রশ্নাবলী ' . fake()->word(),
            'status' => fake()->randomElement(['active', 'deactive']),
        ];
    }
}
