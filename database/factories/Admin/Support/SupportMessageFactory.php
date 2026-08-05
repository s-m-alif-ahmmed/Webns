<?php

namespace Database\Factories\Admin\Support;

use App\Models\Admin\Support\SupportMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Support\SupportMessage>
 */
class SupportMessageFactory extends Factory
{
    protected $model = SupportMessage::class;

    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'company_name' => fake()->company(),
            'designation' => fake()->jobTitle(),
            'email' => fake()->safeEmail(),
            'number' => fake()->numerify('017########'),
            'choose_product' => fake()->randomElement(['ERP Solution', 'HRM System', 'E-Commerce Platform', 'CRM Software']),
            'message' => fake()->paragraph(),
            'note' => fake()->optional()->sentence(),
            'status' => fake()->randomElement(['UnRead', 'Read']),
        ];
    }
}
