<?php

namespace Database\Factories;

use App\Models\Admin\DemoRequest\DemoRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\DemoRequest\DemoRequest>
 */
class DemoRequestFactory extends Factory
{
    protected $model = DemoRequest::class;

    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'company_name' => fake()->company(),
            'designation' => fake()->jobTitle(),
            'email' => fake()->safeEmail(),
            'number' => fake()->phoneNumber(),
            'choose_product' => fake()->randomElement(['ERP Solution', 'HRM System', 'E-Commerce Platform', 'CRM Software']),
            'date' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'time' => fake()->randomElement(['10:00 AM', '02:00 PM', '04:30 PM']),
            'comment' => fake()->paragraph(),
            'note' => fake()->optional()->sentence(),
            'status' => fake()->randomElement(['UnRead', 'Read']),
        ];
    }
}
