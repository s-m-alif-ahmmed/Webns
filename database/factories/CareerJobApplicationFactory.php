<?php

namespace Database\Factories;

use App\Models\Admin\Career\CareerJobApplication;
use App\Models\Admin\Career\CareerJobPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Career\CareerJobApplication>
 */
class CareerJobApplicationFactory extends Factory
{
    protected $model = CareerJobApplication::class;

    public function definition(): array
    {
        $name = fake()->name();
        return [
            'career_job_post_id' => CareerJobPost::factory(),
            'post_id' => 'JOB-' . fake()->numberBetween(100, 999),
            'full_name' => $name,
            'email' => fake()->safeEmail(),
            'number' => fake()->numberBetween(1700000000, 1999999999),
            'expected_salary' => fake()->numberBetween(35000, 100000) . ' BDT',
            'cover_letter' => fake()->paragraph(),
            'resume' => 'admin/pdf/career/sample_resume.pdf',
            'slug_job_application' => Str::slug($name, '-'),
            'checked' => fake()->randomElement(['on', 'off']),
            'shortlisted' => fake()->randomElement(['on', 'off']),
            'interview_call' => fake()->randomElement(['on', 'off']),
            'rejected' => fake()->randomElement(['on', 'off']),
            'hired' => fake()->randomElement(['on', 'off']),
        ];
    }
}
