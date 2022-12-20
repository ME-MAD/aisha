<?php

namespace Tests\Traits;

use App\Models\GroupStudent;

trait GroupStudentTrait
{
    private function generateRandomGroupStudent(int $count = 1)
    {
        if ($count == 1) {
            return GroupStudent::factory()->create();
        }
        return GroupStudent::factory($count)->create();
    }
}
