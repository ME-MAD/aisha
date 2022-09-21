<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Subset;

class QuraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $subject = Subject::updateOrCreate([
            'name' => 'القران الكريم'
        ], []);

        $chapters = chapterQuran();
        foreach ($chapters as $chapter) {
            Lesson::updateOrCreate([

                'title'      => $chapter['surah_ar']

            ], [

                'subject_id' => $subject->id,
            ]);
        };
    }
}