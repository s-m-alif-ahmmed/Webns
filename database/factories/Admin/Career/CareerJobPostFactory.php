<?php

namespace Database\Factories\Admin\Career;

use App\Models\Admin\Career\CareerDepartment;
use App\Models\Admin\Career\CareerDesignation;
use App\Models\Admin\Career\CareerJobPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Career\CareerJobPost>
 */
class CareerJobPostFactory extends Factory
{
    protected $model = CareerJobPost::class;

    public function definition(): array
    {
        $title = fake()->jobTitle() . ' Position';
        return [
            'career_department_id' => CareerDepartment::factory(),
            'career_designation_id' => CareerDesignation::factory(),
            'prefix_id' => 'JOB-' . fake()->numberBetween(100, 999),
            'job_title' => $title,
            'job_type' => fake()->randomElement(['Full Time', 'Part Time', 'Contractual', 'Remote']),
            'vacancy' => (string) fake()->numberBetween(1, 10),
            'experience' => fake()->numberBetween(1, 5) . ' Years',
            'location' => fake()->city() . ', Bangladesh',
            'salary' => fake()->numberBetween(30000, 150000) . ' BDT',
            'job_description' => fake()->paragraphs(3, true),
            'deadline' => fake()->dateTimeBetween('+1 week', '+2 months')->format('Y-m-d'),
            'status' => fake()->randomElement(['Publish', 'Draft']),
            'slug_job_title' => Str::slug($title, '-'),
        ];
    }
}
