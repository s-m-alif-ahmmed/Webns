<?php

namespace Database\Factories;

use App\Models\Admin\SubscribeEmail\SubscribeEmail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\SubscribeEmail\SubscribeEmail>
 */
class SubscribeEmailFactory extends Factory
{
    protected $model = SubscribeEmail::class;

    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
