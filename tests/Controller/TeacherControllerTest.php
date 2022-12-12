<?php

namespace Tests\Controller;

use Mockery;
use Carbon\Carbon;
use Tests\TestCase;
use Mockery\MockInterface;
use Illuminate\Http\UploadedFile;
use Tests\Traits\TestTeacherTrait;
use App\Services\Teacher\TeacherService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherControllerTest extends TestCase
{
    use TestTeacherTrait;

    public function test_index_opens_without_errors()
    {
        $res = $this->call('get', route('admin.teacher.index'));

        $res->assertOk();
    }

    public function test_content_teacher_data_table()
    {
        $tableContent = ['id', 'name', 'avatar', 'birthday', 'phone', 'qualification'];

        $response = $this->get(route('admin.teacher.index'));

        $response->assertOk();

        foreach ($tableContent as $content) {
            $response->assertSee($content);
        }
    }

    /**
     * @test
     * @dataProvider storeValidationProvider
     */
    public function test_store_validations($data)
    {
        $res = $this->call('POST', route('admin.teacher.store'), $data);

        $res->assertSessionHasErrors();
    }

    public function test_store_pass_with_all_data()
    {

        $this->mock(TeacherService::class, function (MockInterface $mock) {
            $mock->shouldReceive('createTeacher')->once();
        });

        $res = $this->call('POST', route('admin.teacher.store'), [
            'name'          => fake()->name,
            'birthday'      => fake()->date(),
            'phone'         => fake()->phoneNumber(),
            'avatar'        => null,
            'qualification' => fake()->text()
        ]);

        $res->assertSessionHasNoErrors();
    }

    /**
     * @dataProvider storeValidationProvider
     */
    public function test_update_validations($data)
    {
        $teacher = $this->generateRandomTeacher();

        $res = $this->call('PUT', route('admin.teacher.update', $teacher->id), $data);

        $res->assertSessionHasErrors();
    }

    public function test_update_works_with_all_data()
    {
        $teacher = $this->generateRandomTeacher();

        $this->mock(TeacherService::class, function (MockInterface $mock) {
            $mock->shouldReceive('updateTeacher')->once();
        });

        $res = $this->call('PUT', route('admin.teacher.update', $teacher->id), [
            'name'          => fake()->name,
            'birthday'      => fake()->date(),
            'phone'         => fake()->phoneNumber(),
            'avatar'        => null,
            'qualification' => fake()->text()
        ]);
        $res->assertSessionHasNoErrors();
    }

    public function test_teacher_get_deleted_without_errors()
    {
        $teacher = $this->generateRandomTeacher();

        $this->mock(TeacherService::class, function(MockInterface $mock){
            $mock->shouldReceive('deleteTeacher')->once();
        });

        $res = $this->call('get', route('admin.teacher.delete', $teacher->id));

        $res->assertSessionHasNoErrors();
    }


    public function storeValidationProvider(): array
    {
        $this->refreshApplication();

        return [
            "without data" => [
                [],
            ],
            "without a name" => [
                [
                    'name'          => null,
                    'birthday'      => fake()->date(),
                    'phone'         => fake()->phoneNumber(),
                    'avatar'        => fake()->name(),
                    'qualification' => fake()->text()
                ],
            ],
            "without a birthday" => [
                [
                    'name'          => fake()->name,
                    'birthday'      => null,
                    'phone'         => fake()->phoneNumber(),
                    'avatar'        => fake()->name(),
                    'qualification' => fake()->text()
                ],
            ],
            "without a phone" => [
                [
                    'name'          => fake()->name,
                    'birthday'      => fake()->date(),
                    'phone'         => null,
                    'avatar'        => fake()->name(),
                    'qualification' => fake()->text()
                ],
            ],
            "If (avatar) its type is a number" => [
                [
                    'name'          => fake()->name,
                    'birthday'      => fake()->date(),
                    'phone'         => fake()->phoneNumber(),
                    'avatar'        => 0,
                    'qualification' => fake()->text()
                ],
            ],
            "if (avatar) its type is not [jpeg, png, jpg, gif, svg, or webp]" => [
                [
                    'name'          => fake()->name,
                    'birthday'      => fake()->date(),
                    'phone'         => fake()->phoneNumber(),
                    'avatar'        => 'string',
                    'qualification' => fake()->text()
                ],
            ],
            "without qualification" => [
                [
                    'name'          => fake()->name,
                    'birthday'      => fake()->date(),
                    'phone'         => fake()->phoneNumber(),
                    'avatar'        => fake()->name(),
                    'qualification' => null
                ],
            ]

        ];
    }
}