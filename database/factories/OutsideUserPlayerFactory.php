<?php

namespace Database\Factories;

use App\Models\OutsideUsers\OutsideUser;
use App\Models\OutsideUsers\OutsideUserPlayer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutsideUsers\OutsideUserPlayer>
 */
class OutsideUserPlayerFactory extends Factory
{
    protected $model = OutsideUserPlayer::class;

    public function definition(): array
    {
        return [
            'outside_user_id' => OutsideUser::factory(),
            'name' => fake()->name(),
            'number' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'image' => 'outside_user/images/player_image/default.jpg',
            'designation' => fake()->jobTitle(),
            'employ_id' => 'PLY-' . fake()->unique()->numberBetween(10000, 99999),
            'employ_id_image' => 'outside_user/images/player_employ_id_photo/default.jpg',
            'player_type' => fake()->randomElement(['Batsman', 'Bowler', 'All Rounder', 'Wicket Keeper', 'Defender', 'Forward']),
            'status' => fake()->randomElement(['Waiting', 'Approved', 'Rejected']),
        ];
    }
}
