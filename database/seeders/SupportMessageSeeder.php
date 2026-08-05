<?php

namespace Database\Seeders;

use App\Models\Admin\Support\SupportMessage;
use Illuminate\Database\Seeder;

class SupportMessageSeeder extends Seeder
{
    public function run(): void
    {
        SupportMessage::factory(10)->create();
    }
}
