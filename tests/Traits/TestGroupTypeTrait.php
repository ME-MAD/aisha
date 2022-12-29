<?php

namespace Tests\Traits;

use App\Models\GroupType;

trait TestGroupTypeTrait
{
    private function generateRandomGroupType(int $count = 1)
    {
        if ($count == 1) {
            return GroupType::factory()->create();
        }
        $data = $this->generateRandomGroupTypeData($count);

        GroupType::insert($data);

        return $data;
        // return GroupType::factory($count)->create();
    }

    private function generateRandomGroupTypeData($count = 1)
    {
        if($count == 1)
        {
            return [
                'name'     => fake()->unique()->name,
                'days_num' => fake()->numberBetween(1,7),
                'price'    => fake()->numberBetween(20,500),
            ];
        }
       
        $data = [];
        for($i = 1; $i <= $count; $i++)
        {
            $data []= [
                'name'     => fake()->unique()->name,
                'days_num' => fake()->numberBetween(1,7),
                'price'    => fake()->numberBetween(20,500),
            ];
        }
        return $data;
    }
}
