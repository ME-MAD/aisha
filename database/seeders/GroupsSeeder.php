<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Group;
use App\Models\GroupDay;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{


    public function run()
    {
        Teacher::factory(2)->create()->each(function ($teacher) {
            Experience::factory(3)->create([
                'teacher_id' => $teacher->id
            ]);


            Group::factory(3)->create([
                'teacher_id' => $teacher->id,
                'group_type_id' => rand(1, 3)

            ])->each(function ($group) {

                $time = fake()->unique()->date('H:i');
//                dd(fake()->dayOfWeek());

                GroupDay::factory()->create([
                    'group_id' => $group->id,
                    'day' => 'Thursday',

                    'from_time' => $time,
                    'to_time' => date('H:i', strtotime("$time +1 hours")),

                ]);


//                Subject::factory(1)->create()->each(function ($subject) use ($group) {
//                    Student::factory(5)->create()->each(function ($student) use ($subject, $group) {
//                        $student->attachRole('student');
//                        $lesson = Lesson::factory(1)->create([
//                            'subject_id' => $subject->id
//                        ])->each(function ($lesson) use ($student, $group) {
//                            StudentLesson::factory(1)->create([
//                                'lesson_id' => $lesson->id,
//                                'student_id' => $student->id,
//                                'group_id' => $group->id
//                            ]);
//                            Exam::factory(1)->create([
//                                'student_id' => $student->id,
//                                'group_id' => $group->id,
//                                'lesson_from' => $lesson->id,
//                                'lesson_to' => $lesson->id
//                            ]);
//                        });
//
//                        GroupStudent::factory(1)->create([
//                            'student_id' => $student->id,
//                            'group_id' => $group->id
//                        ]);
//
//                        Payment::factory(3)->create([
//                            'student_id' => $student->id,
//                            'group_id' => $group->id,
//                        ]);
//                    });
//                });
            });
        });
    }
}
