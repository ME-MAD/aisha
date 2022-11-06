<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@admin.com',
        ], [

            'name' => 'admin',
            'password' => Hash::make('123')
        ]);

        $this->call([
            QuraanSeeder::class,
            TgweedSeeder::class,
            QaidaNooraniahSeeder::class,
            FactorySeeder::class,
        ]);
    }
}