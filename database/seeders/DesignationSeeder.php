<?php

namespace Database\Seeders;

use App\Models\Admin\User\Department;
use App\Models\Admin\User\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::all();

        $designationMap = [
            'Software Engineering' => ['Senior Software Engineer', 'Junior Developer', 'Tech Lead', 'QA Engineer'],
            'Human Resources' => ['HR Manager', 'Talent Acquisition Specialist'],
            'Marketing' => ['Digital Marketing Executive', 'SEO Specialist', 'Content Writer'],
            'Sales' => ['Business Development Manager', 'Sales Executive'],
            'Finance' => ['Chief Accountant', 'Financial Analyst'],
        ];

        foreach ($departments as $department) {
            if (isset($designationMap[$department->name])) {
                foreach ($designationMap[$department->name] as $title) {
                    Designation::firstOrCreate([
                        'department_id' => $department->id,
                        'name' => $title,
                    ], [
                        'status' => 'active',
                    ]);
                }
            } else {
                Designation::factory(2)->create([
                    'department_id' => $department->id,
                ]);
            }
        }
    }
}
