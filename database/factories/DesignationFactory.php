<?php

namespace Database\Factories;

use App\Models\Admin\User\Department;
use App\Models\Admin\User\Designation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\User\Designation>
 */
class DesignationFactory extends Factory
{
    protected $model = Designation::class;

    public function definition(): array
    {
        return [
            'department_id' => Department::factory(),
            'name' => fake()->unique()->jobTitle(),
            'status' => fake()->randomElement(['active', 'deactive']),
        ];
    }
}
