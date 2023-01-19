<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'admin',
                'description' => 'Have All Control On System',
            ],
            [
                'name' => 'teacher',
                'display_name' => 'teacher',
                'description' => 'Have Accessibility on teacher and Student Actions ',
            ],
            [
                'name' => 'student',
                'display_name' => 'student',
                'description' => 'Have Accessibility on Student Actions',
            ],

        ];

        Role::upsert($roles, ['name']);
    }
}
