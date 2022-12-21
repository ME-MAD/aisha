<?php

namespace Tests\Traits;

use App\Models\Student;

Trait TestStudentTrait
{
    private function generateRandomStudent($count = 1)
    {
        if ($count == 1) {
            return Student::factory()->create();
        }
        return Student::factory($count)->create();
    }
}