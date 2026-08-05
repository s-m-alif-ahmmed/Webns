<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Disable foreign key checks to prevent truncation issues
        Schema::disableForeignKeyConstraints();

        // Truncate all tables in dependency order
        DB::table('blog_tag')->truncate();
        DB::table('blogs')->truncate();
        DB::table('tags')->truncate();
        DB::table('categories')->truncate();
        DB::table('faq_images')->truncate();
        DB::table('faqs')->truncate();
        DB::table('faq_categories')->truncate();
        DB::table('career_job_applications')->truncate();
        DB::table('career_job_posts')->truncate();
        DB::table('career_designations')->truncate();
        DB::table('career_departments')->truncate();
        DB::table('contact_messages')->truncate();
        DB::table('demo_requests')->truncate();
        DB::table('subscribe_emails')->truncate();
        DB::table('support_messages')->truncate();
        DB::table('outside_user_players')->truncate();
        DB::table('outside_user_coaches')->truncate();
        DB::table('outside_users')->truncate();
        DB::table('users')->truncate();
        DB::table('designations')->truncate();
        DB::table('departments')->truncate();

        // Re-enable foreign key constraints
        Schema::enableForeignKeyConstraints();

        // Call seeders in logical order
        $this->call([
            DepartmentSeeder::class,
            DesignationSeeder::class,
            User::class,
            CategorySeeder::class,
            TagSeeder::class,
            BlogSeeder::class,
            FaqCategorySeeder::class,
            FaqSeeder::class,
            CareerSeeder::class,
            ContactMessageSeeder::class,
            DemoRequestSeeder::class,
            SubscribeEmailSeeder::class,
            SupportMessageSeeder::class,
            OutsideUserSeeder::class,
        ]);
    }
}
