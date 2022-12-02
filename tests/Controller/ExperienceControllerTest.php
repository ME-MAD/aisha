<?php

namespace Tests\Controller;

use App\Models\Experience;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $this->generateRandomTeacher(count: 2);

        $res = $this->call('get',route('admin.experience.index'));

        $res->assertOk();
        $res->assertViewHas('teachers',Teacher::get());
    }

    public function test_store_fails_without_title()
    {
        $teacher = $this->generateRandomTeacher();

        $res = $this->call('POST',route('admin.experience.store'),[
            'from' => Carbon::yesterday(),
            'to' => Carbon::today(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_without_from()
    {
        $teacher = $this->generateRandomTeacher();

        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'to' => Carbon::today(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_without_to()
    {
        $teacher = $this->generateRandomTeacher();

        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'from' => Carbon::yesterday(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_without_teacher_id()
    {
        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'from' => Carbon::yesterday(),
            'to' => Carbon::today(),
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_if_from_is_less_than_to()
    {
        $teacher = $this->generateRandomTeacher();

        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'from' => Carbon::today(),
            'to' => Carbon::yesterday(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasErrors();
    }

    public function test_store_pass_with_all_data()
    {
        $teacher = $this->generateRandomTeacher();

        $res = $this->call('POST',route('admin.experience.store'),[
            'title' => 'this is title for exps',
            'from' => Carbon::yesterday(),
            'to' => Carbon::today(),
            'teacher_id' => $teacher->id
        ]);

        $res->assertSessionHasNoErrors();
    }
}