<?php

namespace Database\Factories;

use App\Models\Admin\Career\CareerDepartment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Career\CareerDepartment>
 */
class CareerDepartmentFactory extends Factory
{
    protected $model = CareerDepartment::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->jobTitle() . ' Division',
        ];
    }
}
