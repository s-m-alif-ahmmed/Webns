<?php

namespace Database\Seeders;

use App\Models\Admin\Blog\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = ['Laravel', 'VueJS', 'PHP', 'JavaScript', 'React', 'DevOps', 'Mobile App', 'UI/UX'];

        foreach ($tags as $name) {
            Tag::firstOrCreate(
                ['name' => $name],
                ['status' => 'active']
            );
        }
    }
}
