<?php

namespace Tests\Traits;

use App\Models\Teacher;

Trait TestTeacherTrait
{
    private function generateRandomTeacher(int $count = 1)
    {
        if($count == 1)
        {
            return Teacher::factory()->create();
        }
        return Teacher::factory($count)->create();
    }
}