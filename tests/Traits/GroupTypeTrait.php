<?php

namespace Tests\Traits;

use App\Models\GroupType;

trait GroupTypeTrait
{
    private function generateRandomGroupType(int $count = 1)
    {
        if ($count == 1) {
            return GroupType::factory()->create();
        }
        return GroupType::factory($count)->create();
    }
}
