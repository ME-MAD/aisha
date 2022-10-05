<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QaidaNooraniahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = Subject::updateOrCreate([
            'name' => 'القاعدة النورنية'
        ], []);

        $chapters = chapterQaidaNooraniah();

        foreach ($chapters as $chapter) {
            Lesson::updateOrCreate([
                'title'      => $chapter['lesson_ar'],
                'chapters_count' => $chapter['page_row']
            ], [
                'subject_id' => $subject->id,
            ]);
        };
    }
}