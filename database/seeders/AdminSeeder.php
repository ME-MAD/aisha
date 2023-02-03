<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $permissions = Permission::get();
        
        $admin = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'admin',
            'password' => Hash::make('123')
        ]);

        if (!$admin->hasRole('admin')) {

            $admin->attachRole('admin');

            $admin->attachPermissions($permissions);
        }
    }
}
