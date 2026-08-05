<?php

namespace Database\Factories;

use App\Models\Admin\User\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\User\Department>
 */
class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->jobTitle() . ' Department',
            'status' => fake()->randomElement(['active', 'deactive']),
        ];
    }
}
