<?php

namespace Tests\Traits;

use App\Models\GroupStudent;

trait TestGroupStudentTrait
{
    private function generateRandomGroupStudent(int $count = 1)
    {
        $group = $this->generateRandomGroup();
        $student = $this->generateRandomStudent();

        if ($count == 1) {
            return GroupStudent::factory()->create([
                'group_id' => $group->id,
                'student_id' => $student->id
            ]);
        }
        return GroupStudent::factory($count)->create([
            'group_id' => $group->id,
            'student_id' => $student->id
        ]);
    }

    private function generateRandomGroupStudentData()
    {
        $group = $this->generateRandomGroup();
        $student = $this->generateRandomStudent();
        
        return [
            'group_id' => $group->id,
            'student_id' => $student->id
        ];
    }
}
