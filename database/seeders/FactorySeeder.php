<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Experience;
use App\Models\Group;
use App\Models\GroupDay;
use App\Models\GroupStudent;
use App\Models\GroupType;
use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentExam;
use App\Models\StudentLesson;
use App\Models\Subject;
use App\Models\syllabus;
use App\Models\Teacher;
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
        Teacher::factory(2)->create()->each(function ($teacher) {
            Experience::factory(3)->create([
                'teacher_id' => $teacher->id
            ]);

            Group::factory(4)->create([
                'teacher_id' =>$teacher->id
            ]);
            
        });

        Student::factory(2)->create()->each(function($student){
            Exam::factory(3)->create([
                'student_id' => $student->id
            ]);

            GroupStudent::factory(3)->create([
                'student_id' => $student->id
            ]);

            Payment::factory(3)->create([
                'student_id' => $student->id
            ]);

            StudentExam::factory(3)->create([
                'student_id' => $student->id
            ]);

            StudentLesson::factory(3)->create([
                'student_id' => $student->id
            ]);

            syllabus::factory(3)->create([
                'student_id' => $student->id
            ]);
        });

        Group::factory(2)->create()->each(function($group){
            Exam::factory(3)->create([
                'group_id'=> $group->id
            ]);

            GroupDay::factory(4)->create([
                'group_id' =>$group->id
            ]);

            GroupStudent::factory(4)->create([
                'group_id' =>$group->id
            ]);

            Payment::factory(4)->create([
                'group_id' =>$group->id
            ]);

            StudentLesson::factory(4)->create([
                'group_id' =>$group->id
            ]);
        });

        Lesson::factory(3)->create()->each(function($lesson){
             Exam::factory(3)->create([
                'lesson_from' => $lesson->id,
                'lesson_to' => $lesson->id
             ]);

             StudentLesson::factory(3)->create([
                'lesson_id' => $lesson->id,
             ]);

             syllabus::factory(3)->create([
                'new_lesson' => $lesson->id,
             ]);

             syllabus::factory(3)->create([
                'old_lesson' => $lesson->id,
             ]);
        });

        GroupType::factory(4)->create()->each(function($groupType){
              Group::factory(4)->create([
                'group_type_id' => $groupType->id
              ]);
        });

        Subject::factory(5)->create()->each(function($subject){
            Lesson::factory(4)->create([
                'subject_id' =>  $subject->id
            ]);
        });

        Exam::factory()->create()->each(function($exam){
            StudentExam::factory(4)->create([
                'exam_id' =>  $exam->id
            ]);
        });

//-------------------------------------------------------//
        
        Student::factory()->create();
        Subject::factory()->create();

//-------------------------------------------------------//









       


//-------------------  GroupType   -----------------------//

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

//-----------------------------------------------------------//


    }
}
