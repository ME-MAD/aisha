<?php

namespace Database\Seeders;

use App\Models\GroupType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(GroupTypeSeeder::class);

        $this->call([
            QuraanSeeder::class,
            TgweedSeeder::class,
            QaidaNooraniahSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class
        ]);
    }
}