<?php

namespace Database\Seeders;

use App\Models\Admin\DemoRequest\DemoRequest;
use Illuminate\Database\Seeder;

class DemoRequestSeeder extends Seeder
{
    public function run(): void
    {
        DemoRequest::factory(10)->create();
    }
}
