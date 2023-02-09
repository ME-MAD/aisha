<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{

    public function run()
    {
        $groups = Group::factory(5)->create()->each(function ($group) {

        });
    }
}
