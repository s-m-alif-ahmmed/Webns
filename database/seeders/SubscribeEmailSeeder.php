<?php

namespace Database\Seeders;

use App\Models\Admin\SubscribeEmail\SubscribeEmail;
use Illuminate\Database\Seeder;

class SubscribeEmailSeeder extends Seeder
{
    public function run(): void
    {
        SubscribeEmail::factory(15)->create();
    }
}
