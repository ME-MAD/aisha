<?php

namespace Tests\Controller;

use App\Services\GroupDay\GroupDayService;
use Tests\Traits\GroupDayTrait;
use Tests\TestCaseWithTransLationsSetUp;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;
use Tests\Traits\TestGroupTrait;
use Tests\Traits\TestTeacherTrait;

class GroupDayControllerTest extends TestCaseWithTransLationsSetUp
{
    use WithFaker, GroupDayTrait;
    use TestGroupTrait;
    use TestTeacherTrait;

    public function setUp() : void
    {
        parent::setUp();
        $this->refreshApplicationWithLocale('en');
    }


    /**
     * @dataProvider validationData
     */
    public function test_store_validations($validationData)
    {
        $response = $this->post(route('admin.group_day.store'), $validationData);
        $response->assertSessionHasErrors();
    }

    public function validationData(): array
    {
        $this->refreshApplication();

        return [
            "with Null Day" => [
                [
                    'day' => null,
                    'group_id' => 1
                ]
            ],
            "with No Data" => [
                []
            ],

        ];
    }

    public function test_can_store_GroupDay_data()
    {
        $data = $this->generateRandomGroupDayData();

        $this->mock(GroupDayService::class, function(MockInterface $mock){
            $mock->shouldReceive('createGroupDay')->once();
        });

        $res = $this->post(route('admin.group_day.store'), $data);

        $res->assertSessionHasNoErrors();
    }

    public function test_can_update_GroupDay_data()
    {
        $groupDay = $this->generateRandomGroupDay();

        $data = $this->generateRandomGroupDayData();

        $this->mock(GroupDayService::class, function(MockInterface $mock){
            $mock->shouldReceive('updateGroupDay')->once();
        });

        $res = $this->put(route('admin.group_day.update', $groupDay), $data);

        $res->assertSessionHasNoErrors();
    }

    public function test_can_delete_GroupDay()
    {
        $groupDay = $this->generateRandomGroupDay();

        $this->mock(GroupDayService::class, function(MockInterface $mock){
            $mock->shouldReceive('deleteGroupDay')->once();
        });

        $res = $this->get(route('admin.group_day.delete', $groupDay));

        $res->assertSessionHasNoErrors();
    }
}
