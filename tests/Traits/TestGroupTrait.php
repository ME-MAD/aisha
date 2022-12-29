<?php

namespace Tests\Traits;

use App\Models\Group;
use App\Models\GroupType;

Trait TestGroupTrait
{
    private function generateRandomGroup(int $count = 1)
    {
        
        
        if($count == 1)
        {
            $teacher = $this->generateRandomTeacher();
            $groupType = $this->generateRandomGroupType();

            return Group::factory()->create([
                'teacher_id' => $teacher->id,
                'group_type_id' => $groupType->id
            ]);
        }

        $data = $this->generateRandomGroupData($count);

        Group::insert($data);

        return $data;

        // return Group::factory($count)->create([
        //     'teacher_id' => $teacher->id,
        //     'group_type_id' => $groupType->id
        // ]);
    }

    private function generateRandomGroupData($count = 1)
    {
        if($count == 1)
        {
            $teacher = $this->generateRandomTeacher();
            $groupType = $this->generateRandomGroupType();
    
            return [
                'name' => fake()->name,
                'from' => "10:00",
                'to' => "11:00",
                'age_type' => Group::GROUP_TYPES[rand(0, 1)],
                'teacher_id' => $teacher->id,
                'group_type_id' => $groupType->id
            ];
        }

        $teachers = $this->generateRandomTeacher($count);
        $groupTypes = $this->generateRandomGroupType($count);
        $data = [];
        for($i = 1; $i <= $count; $i++)
        {
            $data []= [
                'name' => fake()->name,
                'from' => "10:00",
                'to' => "11:00",
                'age_type' => Group::GROUP_TYPES[rand(0, 1)],
                'teacher_id' => $teachers[$i - 1]['id'],
                'group_type_id' => $groupTypes[$i - 1]['id']
            ];
        }

        return $data;
    }
}