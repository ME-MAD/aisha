<?php

namespace Tests\Traits;

use App\Models\GroupType;
use App\Models\Payment;

Trait TestPaymentTrait
{
    private function generateRandomPaymentsForGroup($group_id)
    {
        return Payment::factory(10)->create([
            'group_id' => $group_id
        ]);
    }

    private function generateRandomPaymentsData()
    {
        $group = $this->generateRandomGroup();
        $student = $this->generateRandomStudent();
        return [
            'group_id' => $group->id,
            'student_id' => $student->id,
            'amount' => $group->groupType->price,
            'month' => fake()->randomElement(getMonthNames()),
            'paid' => fake()->boolean(),
        ];
    }

    private function generateRandomPaymentsDataCustomed(array $configs, $count = 1)
    {
        if($count == 1)
        {
            $group = $this->generateRandomGroup();
            $student = $this->generateRandomStudent();
    
            $data = [
                'group_id' => $group->id,
                'student_id' => $student->id,
                'amount' => $group->groupType->price,
                'month' => fake()->randomElement(getMonthNames()),
                'paid' => fake()->boolean(),
            ];
    
            foreach($configs as $columnName => $value)
            {
                $data[$columnName] = $value;
            }
            return $data;
        }


        $groups = $this->generateRandomGroup($count);
        $student = $this->generateRandomStudent();

        $data = [];
        for($i = 1; $i <= $count; $i++)
        {
            $data []= [
                'group_id' => $groups[$i - 1]['id'],
                'student_id' => $student->id,
                'amount' => GroupType::find($groups[$i -1]['group_type_id'])->amount,
                'month' => fake()->randomElement(getMonthNames()),
                'paid' => fake()->boolean(),
            ];
        }

       
    }

    private function generateRandomPaymentsCustomed(array $configs = [], int $count = 1)
    {
        $data = $this->generateRandomPaymentsDataCustomed($configs);

        if($count == 1)
        {
            return Payment::factory()->create($data);
        }
        return Payment::factory($count)->create($data);
    }
}