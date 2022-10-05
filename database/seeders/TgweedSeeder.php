<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class TgweedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = Subject::updateOrCreate([
            'name' => 'المنهج المفيد لمراكز تعليم الجويد'
        ], []);

        $chapters = chapterTgweed();

        foreach ($chapters as $chapter) {
            Lesson::updateOrCreate([
                'title'      => $chapter['lesson_ar'],
                'chapters_count' => $chapter['num_pages']
            ], [
                'subject_id' => $subject->id,
            ]);
        };
    }
}