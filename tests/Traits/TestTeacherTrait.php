<?php

namespace Tests\Traits;

use App\Models\Teacher;
use Illuminate\Http\UploadedFile;

Trait TestTeacherTrait
{
    private function generateRandomTeacher(int $count = 1)
    {
        if($count == 1)
        {
            return Teacher::factory()->create();
        }
        $data = $this->generateRandomTeacherData($count);

        Teacher::insert($data);

        return $data;
        // return Teacher::factory($count)->create();
    }

    private function generateRandomTeacherData($count = 1)
    {

        if($count == 1)
        {
            return [
                'name'          => fake()->name,
                'birthday'      => fake()->date,
                'phone'         => fake()->phoneNumber,
                'avatar'        => UploadedFile::fake()->image('avatar.jpg'),
                'qualification' => fake()->text
            ];
        }
        
        $data = [];
        for($i = 1; $i <= $count; $i++)
        {
            $data []= [
                'name'          => fake()->name,
                'birthday'      => fake()->date,
                'phone'         => fake()->phoneNumber,
                'avatar'        => UploadedFile::fake()->image('avatar.jpg'),
                'qualification' => fake()->text,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ];
        }
        return $data;
    }
}