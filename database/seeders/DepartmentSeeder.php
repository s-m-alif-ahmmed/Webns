<?php

namespace Database\Seeders;

use App\Models\Admin\User\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $defaultDepartments = ['Software Engineering', 'Human Resources', 'Marketing', 'Sales', 'Finance'];

        foreach ($defaultDepartments as $name) {
            Department::firstOrCreate(
                ['name' => $name],
                ['status' => 'active']
            );
        }

        Department::factory(3)->create();
    }
}
