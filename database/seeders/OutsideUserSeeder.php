<?php

namespace Database\Seeders;

use App\Models\OutsideUsers\OutsideUser;
use App\Models\OutsideUsers\OutsideUserCoach;
use App\Models\OutsideUsers\OutsideUserPlayer;
use Illuminate\Database\Seeder;

class OutsideUserSeeder extends Seeder
{
    public function run(): void
    {
        $outsideUsers = OutsideUser::factory(5)->create();

        foreach ($outsideUsers as $outsideUser) {
            OutsideUserPlayer::factory(8)->create([
                'outside_user_id' => $outsideUser->id,
            ]);

            OutsideUserCoach::factory(2)->create([
                'outside_user_id' => $outsideUser->id,
            ]);
        }
    }
}
