<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Http\Traits\SubjectTrait;
use App\Jobs\BreakPDFIntoImagesJob;
use App\Services\PDFService;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    use SubjectTrait;

    public function __construct(public PDFService $PDFService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->getSubject();

        return view('pages.subject.index', [
            'subjects' => $subjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        $book_name = $this->PDFService->uploadPdfFile(
            $request->file('book'),
            $request->name,
            'subjects',
            null,
            'book'
        );

        $subject = Subject::create([
            'name' => $request->name,
            'book' => $book_name
        ]);

        BreakPDFIntoImagesJob::dispatch($this->PDFService, $subject);

        Alert::toast('قد تاخذ عملية تجهيز الكتاب بعض الوقت', 'warning');
        return redirect(route('admin.subject.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('pages.subject.edit', [
            'subject' => $subject
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {

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

            rename(
                public_path($subject->book),
                public_path('files/subjects/' . $book_name)
            );

            rename(
                public_path('files/subjects/' . $subject->name . "/"),
                public_path('files/subjects/' . $request->name . "/")
            );
        }

        $subject->update([
            'name' => $request->name,
            'book' => $book_name
        ]);

        BreakPDFIntoImagesJob::dispatch($this->PDFService, $subject);

        Alert::toast('قد تاخذ عملية تجهيز الكتاب بعض الوقت', 'warning');
        return redirect(route('admin.subject.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function delete(Subject $subject)
    {
        $this->PDFService->deleteFile($subject->book);
        $this->PDFService->deleteDirectory($subject->directoryName());

        $subject->delete();

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getSubjectBook(Subject $subject)
    {
        dd($subject);
    }
}

