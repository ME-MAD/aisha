<?php

namespace Tests\Controller;

use App\Models\Experience;
use App\Models\Teacher;
use App\Services\Experience\ExperienceService;
use App\Services\Teacher\TeacherService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;
use Tests\Traits\TestExperienceTrait;
use Tests\Traits\TestTeacherTrait;

class ExperienceControllerTest extends TestCase
{
    use TestTeacherTrait;
    use TestExperienceTrait;
    // use RefreshDatabase;

    public function test_index_opens_without_errors()
    {
        $teachers = $this->generateRandomTeacher(count: 2);

        $this->instance(
            TeacherService::class,
            Mockery::mock(TeacherService::class, function(MockInterface $mock) use($teachers) {
                $mock->shouldReceive('getAllTeachers')->once()->andReturn($teachers);
            })
        );

        $res = $this->call('get',route('admin.experience.index'));

        $res->assertOk();
        $res->assertViewHas('teachers',$teachers);
    }

    public function test_store_fails_without_title()
    {
        $teacher = $this->generateRandomTeacher();

        $res = $this->call('POST',route('admin.experience.store'),[
            'from' => Carbon::now()->subDays(20)->toDateString(),
            'to' => Carbon::now()->subDays(10)->toDateString(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_without_from()
    {
        $teacher = $this->generateRandomTeacher();

        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'to' => Carbon::now()->subDays(10)->toDateString(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_without_to()
    {
        $teacher = $this->generateRandomTeacher();

        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'from' => Carbon::now()->subDays(20)->toDateString(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_without_teacher_id()
    {
        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'from' => Carbon::now()->subDays(20)->toDateString(),
            'to' => Carbon::now()->subDays(10)->toDateString(),
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_if_from_is_less_than_to()
    {
        $teacher = $this->generateRandomTeacher();

        $this->mock(ExperienceService::class, function(MockInterface $mock){
            $mock->shouldReceive('createExperience')->once();
        });


        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'from' => Carbon::now()->subDays(11)->toDateString(),
            'to' => Carbon::now()->subDays(10)->toDateString(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_when_from_grater_than_today()
    {

        $teacher = $this->generateRandomTeacher();

        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'from' => Carbon::now()->addDays(1)->toDateString(),
            'to' => Carbon::now()->addDays(2)->toDateString(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_when_to_grater_than_today()
    {

        $teacher = $this->generateRandomTeacher();

        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'from' => Carbon::now()->subDays(10)->toDateString(),
            'to' => Carbon::now()->addDays(2)->toDateString(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasErrors();
    }

    
    public function test_store_pass_with_all_data()
    {
        $teacher = $this->generateRandomTeacher();

        $this->mock(ExperienceService::class, function(MockInterface $mock){
            $mock->shouldReceive('createExperience')->once();
        });

        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'from' => Carbon::now()->subDays(20)->toDateString(),
            'to' => Carbon::now()->subDays(10)->toDateString(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasNoErrors();
    }

    public function test_update_fails_without_data()
    {
        $experience = $this->generateRandomExperience();
        
        $res = $this->call('PUT',route('admin.experience.update',$experience->id),[
            
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_update_fails_without_title()
    {
        $experience = $this->generateRandomExperience();

        $res = $this->call('PUT',route('admin.experience.update',$experience->id),[
            'from' => Carbon::now()->subDays(20)->toDateString(),
            'to' => Carbon::now()->subDays(10)->toDateString(),
            'teacher_id' => $experience->teacher_id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_update_fails_without_from()
    {
        $experience = $this->generateRandomExperience();

        $res = $this->call('PUT',route('admin.experience.update',$experience->id),[
            'title' => 'this is title for exps',
            'to' => Carbon::now()->subDays(10)->toDateString(),
            'teacher_id' => $experience->teacher_id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_update_fails_without_to()
    {
        $experience = $this->generateRandomExperience();

        $res = $this->call('PUT',route('admin.experience.update',$experience->id),[
            'title' => 'this is title for exps',
            'from' => Carbon::now()->subDays(20)->toDateString(),
            'teacher_id' => $experience->teacher_id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_update_fails_without_teacher_id()
    {
        $experience = $this->generateRandomExperience();

        $res = $this->call('PUT',route('admin.experience.update',$experience->id),[
            'title' => 'this is title for exps',
            'from' => Carbon::now()->subDays(20)->toDateString(),
            'to' => Carbon::now()->subDays(10)->toDateString(),
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_update_works_with_all_data()
    {
        $experience = $this->generateRandomExperience();

        $res = $this->call('PUT',route('admin.experience.update',$experience->id),[
            'title' => 'this is title for exps',
            'from' => Carbon::now()->subDays(20)->toDateString(),
            'to' => Carbon::now()->subDays(10)->toDateString(),
            'teacher_id' => $experience->teacher_id
        ]);

        // dd($res);

        $res->assertSessionHasNoErrors();
    }
}