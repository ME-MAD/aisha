<?php

namespace Tests\Controller;

use App\Jobs\BreakPDFIntoImagesJob;
use App\Services\PDFService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Bus;
use Mockery\MockInterface;
use Tests\TestCaseWithTransLationsSetUp;
use Tests\Traits\TestSubjectTrait;

class SubjectControllerTest extends TestCaseWithTransLationsSetUp
{
    use TestSubjectTrait;

    public function setUp() : void
    {
        parent::setUp();
        
        $this->refreshApplicationWithLocale('en');
    }

    public function test_index_opens_without_errors()
    {
        $res = $this->call('get', route('admin.subject.index'));

        $res->assertOk();
    }
    
    public function test_create_opens_without_errors()
    {
        $res = $this->call('get', route('admin.subject.create'));

        $res->assertOk();
    }

    public function test_store_fails_without_name()
    {
        $data = [
            'name' => null,
            'book' => UploadedFile::fake()->create('book.pdf'),
            'avatar' => UploadedFile::fake()->image('avatar.png'),
        ];

        $res = $this->call('POST', route('admin.subject.store'), $data);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_without_book()
    {
        $data = [
            'name' => fake()->name(),
            'book' => null,
            'avatar' => UploadedFile::fake()->image('avatar.png'),
        ];

        $res = $this->call('POST', route('admin.subject.store'), $data);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_if_book_is_not_pdf()
    {
        $data = [
            'name' => fake()->name(),
            'book' => UploadedFile::fake()->create('book.png'),
            'avatar' => UploadedFile::fake()->image('avatar.png'),
        ];

        $res = $this->call('POST', route('admin.subject.store'), $data);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_if_book_is_larger_than_10_migabytes()
    {
        $data = [
            'name' => fake()->name(),
            'book' => UploadedFile::fake()->create('book.pdf')->size(12000),
            'avatar' => UploadedFile::fake()->image('avatar.png'),
        ];

        $res = $this->call('POST', route('admin.subject.store'), $data);

        $res->assertSessionHasErrors();
    }

    public function test_store_fails_if_image_is_wrong_type()
    {
        $data = [
            'name' => fake()->name(),
            'book' => UploadedFile::fake()->create('book.pdf'),
            'avatar' => UploadedFile::fake()->image('avatar.txt'),
        ];

        $res = $this->call('POST', route('admin.subject.store'), $data);

        $res->assertSessionHasErrors();
    }

    public function test_store_passes_with_correct_data()
    {
        $data = [
            'name' => fake()->name(),
            'book' => UploadedFile::fake()->create('book.pdf'),
            'avatar' => UploadedFile::fake()->image('avatar.png'),
        ];

        $this->mock(PDFService::class, function(MockInterface $mock){
            $mock->shouldReceive('uploadPdfFile')->once()->andReturn('book.pdf');
        });

        Bus::fake();

        $res = $this->call('POST', route('admin.subject.store'), $data);

        Bus::assertDispatched(BreakPDFIntoImagesJob::class);

        $res->assertSessionHasNoErrors();
    }

    public function test_edit_opens_without_errors()
    {
        $subject = $this->generateRandomSubject();

        $res = $this->call('get', route('admin.subject.edit',$subject));

        $res->assertOk();
    }


    public function test_update_fails_without_name()
    {
        $subject = $this->generateRandomSubject();

        $data = [
            'name' => null,
            'book' => UploadedFile::fake()->create('book.pdf'),
            'avatar' => UploadedFile::fake()->image('avatar.png'),
        ];

        $res = $this->call('PUT', route('admin.subject.update', $subject), $data);

        $res->assertSessionHasErrors();
    }

    public function test_update_fails_if_book_is_not_pdf()
    {
        $subject = $this->generateRandomSubject();

        $data = [
            'name' => fake()->name(),
            'book' => UploadedFile::fake()->create('book.png'),
            'avatar' => UploadedFile::fake()->image('avatar.png'),
        ];

        $res = $this->call('PUT', route('admin.subject.update', $subject), $data);

        $res->assertSessionHasErrors();
    }

    public function test_update_fails_if_book_is_larger_than_10_migabytes()
    {
        $subject = $this->generateRandomSubject();

        $data = [
            'name' => fake()->name(),
            'book' => UploadedFile::fake()->create('book.pdf')->size(12000),
            'avatar' => UploadedFile::fake()->image('avatar.png'),
        ];

        $res = $this->call('PUT', route('admin.subject.update', $subject), $data);

        $res->assertSessionHasErrors();
    }

    public function test_update_fails_if_image_is_wrong_type()
    {
        $subject = $this->generateRandomSubject();

        $data = [
            'name' => fake()->name(),
            'book' => UploadedFile::fake()->create('book.pdf'),
            'avatar' => UploadedFile::fake()->image('avatar.txt'),
        ];

        $res = $this->call('PUT', route('admin.subject.update', $subject), $data);

        $res->assertSessionHasErrors();
    }

    public function test_update_passes_with_correct_data()
    {
        $subject = $this->generateRandomSubject();
        
        $data = [
            'name' => fake()->name(),
            'book' => UploadedFile::fake()->create('book.pdf'),
            'avatar' => UploadedFile::fake()->image('avatar.png'),
        ];

        $this->mock(PDFService::class, function(MockInterface $mock){
            $mock->shouldReceive('uploadPdfFile')->once()->andReturn('book.pdf');
        });

        Bus::fake();

        $res = $this->call('PUT', route('admin.subject.update', $subject), $data);

        Bus::assertDispatched(BreakPDFIntoImagesJob::class);

        $res->assertSessionHasNoErrors();
    }

}
