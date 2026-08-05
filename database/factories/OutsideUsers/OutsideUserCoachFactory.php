<?php

namespace Database\Factories\OutsideUsers;

use App\Models\OutsideUsers\OutsideUser;
use App\Models\OutsideUsers\OutsideUserCoach;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutsideUsers\OutsideUserCoach>
 */
class OutsideUserCoachFactory extends Factory
{
    protected $model = OutsideUserCoach::class;

    public function definition(): array
    {
        return [
            'outside_user_id' => OutsideUser::factory(),
            'name' => fake()->name(),
            'number' => fake()->unique()->numerify('016########'),
            'email' => fake()->unique()->safeEmail(),
            'image' => 'outside_user/images/coach_image/default.jpg',
            'designation' => 'Head Coach',
            'employ_id' => 'CCH-' . fake()->unique()->numberBetween(10000, 99999),
            'employ_id_image' => 'outside_user/images/coach_employ_id_photo/default.jpg',
            'status' => fake()->randomElement(['Waiting', 'Approved', 'Rejected']),
        ];
    }
}
