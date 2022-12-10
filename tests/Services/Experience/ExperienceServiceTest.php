<?php

namespace Tests\Services\Experience;

use App\Services\Experience\ExperienceService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\TestExperienceTrait;
use Tests\Traits\TestTeacherTrait;

class ExperienceServiceTest extends TestCase
{

    use TestTeacherTrait;
    use TestExperienceTrait;


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

    public function test_update_experience()
    {
        $experienceObject = new ExperienceService();
        $experience = $this->generateRandomExperience();
        $data = (object)[
            'title' => fake()->name,
            'from' => Carbon::now()->subDays(20)->toDateString(),
            'to' => Carbon::now()->subDays(10)->toDateString(),
            'teacher_id' => $experience->teacher_id
        ];

        $experienceObject->updateExperience($experience ,$data);

        $this->assertDatabaseHas('experiences',(array) $data);
    }


    public function test_delete_experience()
    {
        $experienceObject = new ExperienceService();
        $experience = $this->generateRandomExperience();

        $experienceObject->deleteExperience($experience);

        $this->assertDatabaseMissing('experiences',[
            'id' => $experience->id
        ]);
    }


}