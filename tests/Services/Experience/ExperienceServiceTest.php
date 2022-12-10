<?php

namespace Tests\Services\Experience;

use App\Services\Experience\ExperienceService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\TestTeacherTrait;

class ExperienceServiceTest extends TestCase
{

    use TestTeacherTrait;


    public function test_create_experience()
    {
        $experienceObject = new ExperienceService();
        $teacher = $this->generateRandomTeacher();
        $data = (object)[
            'title' => fake()->name,
            'from' => Carbon::now()->subDays(20)->toDateString(),
            'to' => Carbon::now()->subDays(10)->toDateString(),
            'teacher_id' => $teacher->id
        ];

        $experienceObject->createExperience($data);

        $this->assertDatabaseHas('experiences',(array) $data);
    }
}