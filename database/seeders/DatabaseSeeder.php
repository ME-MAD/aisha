<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            GroupTypeSeeder::class,
            QuraanSeeder::class,
            TgweedSeeder::class,
            QaidaNooraniahSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
