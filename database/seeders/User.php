<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@webnstech.net',
            'password' => Hash::make('87654321'),
            'permission' => '{"users_all":{"user_department":{"department_manage":"department_manage","department_detail":"department_detail","department_number":"department_number","department_create":"department_create","department_edit":"department_edit","department_status":"department_status","department_delete":"department_delete"},"user_designation":{"designation_manage":"designation_manage","designation_detail":"designation_detail","designation_number":"designation_number","designation_create":"designation_create","designation_edit":"designation_edit","designation_status":"designation_status","designation_delete":"designation_delete"},"employ_all":{"employ_manage":"employ_manage","employ_detail":"employ_detail","employ_create":"employ_create","employ_edit":"employ_edit","employ_permission":"employ_permission","employ_password":"employ_password","employ_restriction":"employ_restriction","employ_delete":"employ_delete"}},"user_profile":{"profile_setting":"profile_setting","profile_edit":"profile_edit","profile_email":"profile_email","profile_phone":"profile_phone","profile_number":"profile_number","profile_role":"profile_role","profile_department_designation":"profile_department_designation"},"blogs_all":{"blog_categories":{"manage_category":"manage_category","category_detail":"category_detail","category_number":"category_number","category_create":"category_create","category_edit":"category_edit","category_status":"category_status","category_delete":"category_delete"},"blog_tags":{"manage_tag":"manage_tag","tag_detail":"tag_detail","tag_number":"tag_number","tag_create":"tag_create","tag_edit":"tag_edit","tag_status":"tag_status","tag_delete":"tag_delete"},"blogs":{"manage_blog":"manage_blog","blog_detail":"blog_detail","blog_number":"blog_number","blog_create":"blog_create","blog_edit":"blog_edit","blog_status":"blog_status","blog_popular_status":"blog_popular_status","blog_delete":"blog_delete"}}}',
            'role' => 'super_admin',
        ]);

//        use this command for seed
//        php artisan migrate:fresh --seed --seeder=User
    }
}
