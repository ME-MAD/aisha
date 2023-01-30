<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Http\Traits\ImageTrait;
use App\Jobs\BreakPDFIntoImagesJob;
use App\Services\PDFService;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    use ImageTrait;

    private $PDFService;

    public function __construct(PDFService $PDFService)
    {
        $this->PDFService = $PDFService;
    }
    
    public function index()
    {
        $subjects = Subject::get();

        return view('pages.subject.index', [
            'subjects' => $subjects
        ]);
    }

    public function create()
    {
        return view('pages.subject.create');
    }

    public function store(StoreSubjectRequest $request)
    {
        $fileName = $this->uploadImage(
            imageObject: $request->file('avatar'),
            path: Subject::AVATARS_PATH
        );

        $book_name = $this->PDFService->uploadPdfFile(
            $request->file('book'),
            $request->name,
            'subjects',
            null,
            'book'
        );

        $subject = Subject::create([
            'name' => $request->name,
            'book' => $book_name,
            'avatar' =>  $fileName,
        ]);

        BreakPDFIntoImagesJob::dispatch($this->PDFService, $subject);

        Alert::toast('قد تاخذ عملية تجهيز الكتاب بعض الوقت', 'warning');
        return redirect(route('admin.subject.index'));
    }

    public function edit(Subject $subject)
    {
        return view('pages.subject.edit', [
            'subject' => $subject
        ]);
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $fileName = $subject->getRawOriginal('avatar');

        if ($request->file('avatar')) {

            $this->deleteImage(
                path: $subject->getAvatarPath()
            );

            $fileName = $this->uploadImage(
                imageObject: $request->file('avatar'),
                path: Subject::AVATARS_PATH
            );
        }

        if ($book = $request->file('book')) {
            $this->PDFService->deleteFile($subject->book);

            $this->PDFService->deleteDirectory($subject->directoryName());

            $book_name = $this->PDFService->uploadPdfFile(
                $book,
                $request->name,
                'subjects',
                null,
                'book'
            );
        } else {
            $book_name = $request->name . "_book" . "." . "pdf";

            if(file_exists($subject->book))
            {
                rename(
                    public_path($subject->book),
                    public_path('files/subjects/' . $book_name)
                );
    
                rename(
                    public_path('files/subjects/' . $subject->name . "/"),
                    public_path('files/subjects/' . $request->name . "/")
                );
            }
        }

        $subject->update([
            'name' => $request->name,
            'book' => $book_name,
            'avatar' =>  $fileName,
        ]);

        BreakPDFIntoImagesJob::dispatch($this->PDFService, $subject);

        Alert::toast('قد تاخذ عملية تجهيز الكتاب بعض الوقت', 'warning');
        return redirect(route('admin.subject.index'));
    }

    public function delete(Subject $subject)
    {
        $this->deleteImage(
            path: $subject->getAvatarPath()
        );
        $this->PDFService->deleteFile($subject->book);
        $this->PDFService->deleteDirectory($subject->directoryName());

        $subject->delete();

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}