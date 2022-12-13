<?php
namespace Tests\Controller;

use App\Models\Group;
use App\Models\GroupType;
use App\Services\Group\GroupService;
use Mockery\MockInterface;
use Tests\TestCase;
use Tests\Traits\TestGroupTrait;
use Tests\Traits\TestTeacherTrait;

class GroupControllerTest extends TestCase
{
    use TestTeacherTrait;
    use TestGroupTrait;

    public function test_index_opens_without_errors()
    {
        $res = $this->call('get',route('admin.group.index'));

        $res->assertOk();
    }


    public function test_show_opens_without_errors()
    {
        $group = $this->generateRandomGroup();

        $res = $this->call('get',route('admin.group.show', $group));

        $res->assertOk();
    }

     /**
     * @test
     * @dataProvider storeValidationProvider
     */
    public function test_store_validations($data)
    {
        $res = $this->call('POST',route('admin.group.store'), $data);

        $res->assertSessionHasErrors();
    }

    public function test_store_pass_with_all_data()
    {
        $data = $this->generateRandomGroupData();

        $this->mock(GroupService::class, function(MockInterface $mock){
            $mock->shouldReceive('createGroup')->once();
        });

        $res = $this->call('POST',route('admin.group.store'),$data);

        $res->assertSessionHasNoErrors();
    }

    /**
     * @dataProvider storeValidationProvider
     */
    public function test_update_validations($data)
    {
        $group = $this->generateRandomGroup();
        
        $res = $this->call('PUT',route('admin.group.update',$group->id),$data);

        $res->assertSessionHasErrors();
    }

    public function test_update_works_with_all_data()
    {
        $group = $this->generateRandomGroup();
        $data = $this->generateRandomGroupData();

        $this->mock(GroupService::class, function(MockInterface $mock){
            $mock->shouldReceive('updateGroup')->once();
        });

        $res = $this->call('PUT',route('admin.group.update',$group->id), $data);

        $res->assertSessionHasNoErrors();
    }

    public function test_experience_get_deleted_without_errors()
    {
        $group = $this->generateRandomGroup();

        $res = $this->call('get',route('admin.group.delete',$group->id));

        $res->assertSessionHasNoErrors();
    }


    public function storeValidationProvider() : array
    {
        $this->refreshApplication();
        $teacher = $this->generateRandomTeacher();
        $groupType = GroupType::inRandomOrder()->first();
        
        return [
            "without data" => [
                [
                    
                ],
            ],
            "without a from" => [
                [
                    'to' => fake()->time(),
                    'age_type' => Group::GROUP_TYPES[rand(0, 1)],
                    'teacher_id' => $teacher->id,
                    'group_type_id' => $groupType->id
                ],
            ],
            "without a To" =>[
                [
                    'from' => fake()->time(),
                    'age_type' => Group::GROUP_TYPES[rand(0, 1)],
                    'teacher_id' => $teacher->id,
                    'group_type_id' => $groupType->id
                ],
            ],
            "without a Age Type" => [
                [
                    'from' => "10:00",
                    'to' => "11:00",
                    'teacher_id' => $teacher->id,
                    'group_type_id' => $groupType->id
                ],
            ],
            "without teacher_id" => [ 
                [
                    'from' => "10:00",
                    'to' => "11:00",
                    'age_type' => Group::GROUP_TYPES[rand(0, 1)],
                    'group_type_id' => $groupType->id
                ],
            ],
            "without group type id" => [
                [
                    'from' => "10:00",
                    'to' => "11:00",
                    'age_type' => Group::GROUP_TYPES[rand(0, 1)],
                    'teacher_id' => $teacher->id,
                ],
            ],
            "if (from) is grater than to" => [
                [
                    'from' => "8:00",
                    'to' => "6:00",
                    'age_type' => Group::GROUP_TYPES[rand(0, 1)],
                    'teacher_id' => $teacher->id,
                    'group_type_id' => $groupType->id
                ],
            ],
        ];
    }
}