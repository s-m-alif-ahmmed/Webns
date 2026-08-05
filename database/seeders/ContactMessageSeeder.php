<?php

namespace Database\Seeders;

use App\Models\Admin\Contact\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        ContactMessage::factory(10)->create();
    }
}
