<?php

namespace Database\Seeders;

use App\Models\Admin\Faq\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    public function run(): void
    {
        $faqCategories = [
            ['english' => 'General Information', 'bangla' => 'সাধারণ তথ্য'],
            ['english' => 'Account & Billing', 'bangla' => 'একাউন্ট এবং বিলিং'],
            ['english' => 'Technical Support', 'bangla' => 'কারিগরি সহায়তা'],
            ['english' => 'Services & Products', 'bangla' => 'সেবা ও পণ্যসমূহ'],
        ];

        foreach ($faqCategories as $cat) {
            FaqCategory::firstOrCreate(
                ['english' => $cat['english']],
                ['bangla' => $cat['bangla'], 'status' => 'active']
            );
        }
    }
}
