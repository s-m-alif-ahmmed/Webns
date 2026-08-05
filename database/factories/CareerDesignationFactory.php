<?php

namespace Database\Factories;

use App\Models\Admin\Career\CareerDepartment;
use App\Models\Admin\Career\CareerDesignation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Career\CareerDesignation>
 */
class CareerDesignationFactory extends Factory
{
    protected $model = CareerDesignation::class;

    public function definition(): array
    {
        return [
            'career_department_id' => CareerDepartment::factory(),
            'name' => fake()->jobTitle(),
            'prefix_id' => 'PRE-' . fake()->unique()->numberBetween(1000, 9999),
        ];
    }
}
