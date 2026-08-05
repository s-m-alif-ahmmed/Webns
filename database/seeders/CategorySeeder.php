<?php

namespace Database\Seeders;

use App\Models\Admin\Blog\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Technology', 'Software Development', 'Artificial Intelligence', 'Cybersecurity', 'Cloud Computing', 'Business & Design'];

        foreach ($categories as $name) {
            Category::firstOrCreate(
                ['name' => $name],
                ['status' => 'active']
            );
        }
    }
}
