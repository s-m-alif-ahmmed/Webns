<?php

namespace Database\Factories;

use App\Models\OutsideUsers\OutsideUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutsideUsers\OutsideUser>
 */
class OutsideUserFactory extends Factory
{
    protected $model = OutsideUser::class;

    public function definition(): array
    {
        return [
            'company_name' => fake()->unique()->company(),
            'company_logo' => 'outside_user/images/company_logo/default.png',
            'company_email' => fake()->unique()->companyEmail(),
            'company_number' => fake()->unique()->phoneNumber(),
            'company_address' => fake()->address(),
            'team_manager_name' => fake()->name(),
            'manager_designation' => fake()->jobTitle(),
            'manager_email' => fake()->unique()->safeEmail(),
            'manager_number' => fake()->unique()->phoneNumber(),
            'manager_employ_id' => 'EMP-' . fake()->unique()->numberBetween(10000, 99999),
            'manager_employ_id_image' => 'outside_user/images/manager_employ_id_photo/default.jpg',
            'manager_photo' => 'outside_user/images/team-manager_image/default.jpg',
            'password' => Hash::make('12345678'),
            'terms' => 'agreed',
            'ban_status' => 0,
            'approve_status' => fake()->randomElement(['Waiting', 'Approved', 'Rejected']),
        ];
    }
}
