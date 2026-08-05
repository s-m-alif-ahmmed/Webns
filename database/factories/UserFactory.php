<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'photo' => 'admin/images/user/default.png',
            'officer_id' => 'EMP-' . fake()->unique()->numberBetween(100, 999),
            'number' => fake()->numerify('017########'),
            'address' => fake()->address(),
            'department_id' => null,
            'designation_id' => null,
            'permission' => json_encode(['users_all' => 'users_all', 'blogs_all' => 'blogs_all']),
            'ban_status' => 0,
            'role' => fake()->randomElement(['admin', 'employee', 'visitor']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
