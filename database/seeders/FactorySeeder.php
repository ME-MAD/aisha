<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\GroupType;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::factory(2)->create()->each(function($teacher){
            Experience::factory(3)->create([
                'teacher_id' => $teacher->id
            ]);
        });
        Student::factory()->create();

        GroupType::updateOrCreate([
            'name' => 'normal',
        ],[
            'price' => 80,
            'days_num' => 2
        ]);
        GroupType::updateOrCreate([
            'name' => 'dense',
        ],[
            'price' => 120,
            'days_num' => 2
        ]);
        GroupType::updateOrCreate([
            'name' => 'all week',
        ],[
            'price' => 200,
            'days_num' => 2
        ]);

    }
}
