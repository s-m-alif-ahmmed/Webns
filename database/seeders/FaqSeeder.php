<?php

namespace Database\Seeders;

use App\Models\Admin\Faq\Faq;
use App\Models\Admin\Faq\FaqCategory;
use App\Models\Admin\Faq\FaqImage;
use App\Models\User;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();
        $categories = FaqCategory::all();

        if ($categories->isEmpty()) {
            $categories = FaqCategory::factory(2)->create();
        }

        foreach ($categories as $category) {
            $faqs = Faq::factory(3)->create([
                'user_id' => $user->id,
                'faq_category_id' => $category->id,
            ]);

            foreach ($faqs as $faq) {
                FaqImage::factory(2)->create([
                    'faq_id' => $faq->id,
                ]);
            }
        }
    }
}
