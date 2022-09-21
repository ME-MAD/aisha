<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Database\Seeder;

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