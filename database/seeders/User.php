<?php

namespace Database\Seeders;

use App\Models\Admin\User\Department;
use App\Models\Admin\User\Designation;
use App\Models\User as UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = Department::first();
        $designation = Designation::first();

        $permissions = json_encode([
            'users_all' => [
                'user_department' => [
                    'department_manage' => 'department_manage',
                    'department_detail' => 'department_detail',
                    'department_number' => 'department_number',
                    'department_create' => 'department_create',
                    'department_edit' => 'department_edit',
                    'department_status' => 'department_status',
                    'department_delete' => 'department_delete'
                ],
                'user_designation' => [
                    'designation_manage' => 'designation_manage',
                    'designation_detail' => 'designation_detail',
                    'designation_number' => 'designation_number',
                    'designation_create' => 'designation_create',
                    'designation_edit' => 'designation_edit',
                    'designation_status' => 'designation_status',
                    'designation_delete' => 'designation_delete'
                ],
                'employ_all' => [
                    'employ_manage' => 'employ_manage',
                    'employ_detail' => 'employ_detail',
                    'employ_create' => 'employ_create',
                    'employ_edit' => 'employ_edit',
                    'employ_permission' => 'employ_permission',
                    'employ_password' => 'employ_password',
                    'employ_restriction' => 'employ_restriction',
                    'employ_delete' => 'employ_delete'
                ],
                'team_all' => ['team_manage' => 'team_manage']
            ],
            'user_profile' => [
                'profile_setting' => 'profile_setting',
                'profile_edit' => 'profile_edit',
                'profile_email' => 'profile_email',
                'profile_phone' => 'profile_phone',
                'profile_number' => 'profile_number',
                'profile_role' => 'profile_role',
                'profile_department_designation' => 'profile_department_designation'
            ],
            'blogs_all' => [
                'blog_categories' => [
                    'manage_category' => 'manage_category',
                    'category_detail' => 'category_detail',
                    'category_number' => 'category_number',
                    'category_create' => 'category_create',
                    'category_edit' => 'category_edit',
                    'category_status' => 'category_status',
                    'category_delete' => 'category_delete'
                ],
                'blog_tags' => [
                    'manage_tag' => 'manage_tag',
                    'tag_detail' => 'tag_detail',
                    'tag_number' => 'tag_number',
                    'tag_create' => 'tag_create',
                    'tag_edit' => 'tag_edit',
                    'tag_status' => 'tag_status',
                    'tag_delete' => 'tag_delete'
                ],
                'blogs' => [
                    'manage_blog' => 'manage_blog',
                    'blog_detail' => 'blog_detail',
                    'blog_number' => 'blog_number',
                    'blog_create' => 'blog_create',
                    'blog_edit' => 'blog_edit',
                    'blog_status' => 'blog_status',
                    'blog_popular_status' => 'blog_popular_status',
                    'blog_delete' => 'blog_delete'
                ]
            ],
            'career_all' => [
                'career_department' => [
                    'department_manage' => 'department_manage',
                    'department_detail' => 'department_detail',
                    'department_create' => 'department_create',
                    'department_edit' => 'department_edit',
                    'department_delete' => 'department_delete'
                ],
                'career_designation' => [
                    'designation_manage' => 'designation_manage',
                    'designation_detail' => 'designation_detail',
                    'designation_create' => 'designation_create',
                    'designation_edit' => 'designation_edit',
                    'designation_delete' => 'designation_delete'
                ],
                'job_post_all' => [
                    'job_post_manage' => 'job_post_manage',
                    'job_post_detail' => 'job_post_detail',
                    'job_post_preview' => 'job_post_preview',
                    'job_post_create' => 'job_post_create',
                    'job_post_edit' => 'job_post_edit',
                    'job_post_status' => 'job_post_status',
                    'job_post_delete' => 'job_post_delete'
                ],
                'job_application_all' => [
                    'job_application_manage' => 'job_application_manage',
                    'job_application_detail' => 'job_application_detail',
                    'job_application_delete' => 'job_application_delete',
                    'job_application_download' => 'job_application_download',
                    'job_application_name' => 'job_application_name',
                    'job_application_email' => 'job_application_email',
                    'job_application_checked' => 'job_application_checked',
                    'job_application_shortlisted' => 'job_application_shortlisted',
                    'job_application_interview_call' => 'job_application_interview_call',
                    'job_application_rejected' => 'job_application_rejected',
                    'job_application_hired' => 'job_application_hired'
                ]
            ],
            'event_all' => 'event_all',
            'faq_all' => 'faq_all',
            'press_release_all' => 'press_release_all',
            'settings_all' => 'settings_all',
            'queries_all' => 'queries_all',
            'pages_all' => 'pages_all'
        ]);

        // Seed Super Admin
        UserModel::updateOrCreate(
            ['email' => 'superadmin@webnstech.net'],
            [
                'name' => 'Super Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('87654321'),
                'officer_id' => 'SA-001',
                'number' => '01700000000',
                'address' => 'Dhaka, Bangladesh',
                'department_id' => $department?->id,
                'designation_id' => $designation?->id,
                'permission' => $permissions,
                'role' => 'super_admin',
                'ban_status' => 0,
            ]
        );

        // Seed sample Admin & Employee Users
        UserModel::factory(5)->create([
            'department_id' => $department?->id,
            'designation_id' => $designation?->id,
        ]);
    }
}
