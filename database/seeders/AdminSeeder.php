<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $permissions = getPermissionsArray();
        
        $adminRole = Role::where('name', 'admin')->first();

        $admin = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'admin',
            'password' => Hash::make('123')
        ]);

        if (!$admin->hasRole('admin')) {

            $admin->attachRole('admin');

            $adminRole->attachPermissions($permissions);
        }
    }
}
