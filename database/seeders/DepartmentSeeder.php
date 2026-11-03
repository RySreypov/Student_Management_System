<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['dept_name' => 'Management Information System', 'manager_id' => 101, 'location_id' => 1],
            ['dept_name' => 'Design',                        'manager_id' => 102, 'location_id' => 2],
            ['dept_name' => 'Computer Science',              'manager_id' => 103, 'location_id' => 1],
            ['dept_name' => 'Accounting',                    'manager_id' => 104, 'location_id' => 3],
        ];

        foreach ($departments as $d) {
            Department::create($d);
        }
    }
}
