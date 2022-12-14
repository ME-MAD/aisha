<?php

namespace Tests\Controller;

use App\Models\GroupDay;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupDayControllerTest extends TestCase
{
    use WithFaker;


    /**
     * @dataProvider validationData
     */
    public function test_validations($validationData)
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
                [

                ]
            ],

        ];
    }

    public function test_can_store_GroupDay_data()
    {
        $data = [
            'group_id' => $this->faker()->numberBetween(1, 10),
            'day' => $this->faker()->dayOfWeek()
        ];

        $this->post(route('admin.group_day.store'), $data);

        $this->assertDatabaseHas('group_days', $data);

    }

    public function test_can_update_GroupDay_data()
    {
        $groupDay = GroupDay::factory()->create();

        $data =
            [
                'group_id' => 20,
                'day' => 'Friday',
            ];

        $this->put(route('admin.group_day.update', $groupDay), $data);

        $this->assertDatabaseHas('group_days', $data);

    }

    public function test_can_delete_GroupDay_data()
    {
        $groupDay = GroupDay::factory()->create();
        $this->get(route('admin.group_day.delete', $groupDay));
        $this->assertModelMissing($groupDay);


    }
}
