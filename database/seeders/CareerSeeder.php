<?php

namespace Database\Seeders;

use App\Models\Admin\Career\CareerDepartment;
use App\Models\Admin\Career\CareerDesignation;
use App\Models\Admin\Career\CareerJobApplication;
use App\Models\Admin\Career\CareerJobPost;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        $departmentsData = [
            'Engineering' => ['Software Engineer', 'Frontend Developer', 'Backend Developer'],
            'Design' => ['UI/UX Designer', 'Graphic Designer'],
            'Human Resources' => ['HR Executive', 'Recruiter'],
        ];

        foreach ($departmentsData as $deptName => $designations) {
            $dept = CareerDepartment::firstOrCreate(['name' => $deptName]);

            foreach ($designations as $desigName) {
                $desig = CareerDesignation::firstOrCreate(
                    [
                        'career_department_id' => $dept->id,
                        'name' => $desigName,
                    ],
                    [
                        'prefix_id' => 'WEBNS-' . strtoupper(substr($deptName, 0, 3)) . '-' . strtoupper(substr($desigName, 0, 3)) . '-' . date('Y-m-d'),
                    ]
                );

                $jobPost = CareerJobPost::factory()->create([
                    'career_department_id' => $dept->id,
                    'career_designation_id' => $desig->id,
                    'job_title' => $desigName . ' Needed',
                ]);

                CareerJobApplication::factory(3)->create([
                    'career_job_post_id' => $jobPost->id,
                    'post_id' => $jobPost->prefix_id,
                ]);
            }
        }
    }
}
