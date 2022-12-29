<?php

namespace Tests\Controller;

use App\Services\Experience\ExperienceService;
use Carbon\Carbon;
use Mockery\MockInterface;
use Tests\TestCaseWithTransLationsSetUp;
use Tests\Traits\TestGroupStudentTrait;
use Tests\Traits\TestGroupTrait;
use Tests\Traits\TestGroupTypeTrait;
use Tests\Traits\TestStudentTrait;
use Tests\Traits\TestTeacherTrait;

class GroupStudentControllerTest extends TestCaseWithTransLationsSetUp
{
    use TestGroupTrait;
    use TestStudentTrait;
    use TestGroupStudentTrait;
    use TestTeacherTrait;
    use TestGroupTypeTrait;

    public function setUp() : void
    {
        parent::setUp();
        $this->refreshApplicationWithLocale('en');
    }

    public function test_index_opens_without_errors()
    {
        $res = $this->call('get',route('admin.group_students.index'));

        $res->assertOk();
    }

    /**
     * @test
     * @dataProvider storeValidationProvider
     */
    public function test_store_validations($data)
    {
        $res = $this->call('POST',route('admin.group_students.store'), $data);

        $res->assertSessionHasErrors();
    }

    public function test_store_pass_with_all_data()
    {
        $data = $this->generateRandomGroupStudentData();
        // $this->mock(ExperienceService::class, function(MockInterface $mock){
        //     $mock->shouldReceive('createExperience')->once();
        // });

        

        $res = $this->call('POST',route('admin.group_students.store'), $data);

        $res->assertSessionHasNoErrors();
    }

    public function test_delete_works_without_errors()
    {
        $groupStudent = $this->generateRandomGroupStudent();

        // $this->mock(ExperienceService::class, function(MockInterface $mock){
        //     $mock->shouldReceive('deleteExperience')->once();
        // });

        $res = $this->call('get',route('admin.group_students.delete',$groupStudent->id));

        $res->assertSessionHasNoErrors();
    }


    public function storeValidationProvider() : array
    {
        $this->refreshApplication();
        $student = $this->generateRandomStudent();
        $group = $this->generateRandomGroup();
        
        return [
            "without data" => [
                [
                    
                ],
            ],
            "without a student_id" => [
                [
                    'student_id' => null,
                    'group_id' => $group->id,
                ],
            ],
            "without a group_id" =>[
                [
                    'student_id' => $student->id,
                    'group_id' => null,
                ],
            ],
        ];
    }
}