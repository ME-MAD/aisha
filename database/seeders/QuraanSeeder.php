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


        // there is a problem I think her name "in pluse one but unfortunately I can't solve it  "
        $subject = Subject::upsert([
            'name' => 'القرآن الكريم'
        ], []);
        // dd($subject);


        //---------------------------- this is olde code--------------------------// 
        // foreach ($chapters as $chapter) {
        //     Lesson::upsert([
        //         'title' => $chapter['surah_ar'],
        //         'subject_id' => $subject->id,
        //     ], [
        //         'chapters_count' => $chapter['surah_count'],
        //         'from_page' => $chapter['from_page'],
        //         'to_page' => $chapter['to_page'],
        //     ]);
        // }
        //--------------------------------------------------------------------//             



        //this my new code 
        // problem solving is 
        // 1- recored in DataBase Id for Lesson 
        // 2- prevent recurrnece in DataBase for table Lesson
        $chapters = chapterQuran();
        $chapterarray = [];

        foreach ($chapters as $lesson_id => $chapter) {

            $chapterarray[] = [
                'id' => $lesson_id + 1,
                'title' => $chapter['surah_ar'],
                'subject_id' => $subject->id,
                'chapters_count' => $chapter['surah_count'],
                'from_page' => $chapter['from_page'],
                'to_page' => $chapter['to_page'],
            ];
        }

        Lesson::upsert(
            $chapterarray,
            ['lesson_id'],
            ['title'],
            ['subject_id'],
            ['chapters_count'],
            ['from_page'],
            ['to_page'],
        );
        // dd($chapterarray);
    }
}