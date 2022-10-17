<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Http\Traits\SubjectTrait;
use RealRashid\SweetAlert\Facades\Alert;
use setasign\Fpdi\Fpdi;
use Spatie\PdfToImage\Pdf;

use function PHPUnit\Framework\fileExists;

class SubjectController extends Controller
{
    use SubjectTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->getSubject();

        return view('pages.subject.index',[
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
        $book = $request->file('book');
        $ext = $book->getClientOriginalExtension();
        $book_name = $request->name . "_book" . "." . $ext;

        $book->move(public_path('files/subjects/'),$book_name);

        Subject::create([
            'name' => $request->name,
            'book' => $book_name
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
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
        return view('pages.subject.edit',[
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
        $book_name = $subject->getRawOriginal('book');
        if($book = $request->file('book'))
        {
            if(fileExists(public_path($subject->book)))
            {
                unlink(public_path($subject->book));
            }
            $ext = $book->getClientOriginalExtension();
            $book_name = $request->name . "_book" . "." . $ext;

            $book->move(public_path('files/subjects/'),$book_name);
        }

        $subject->update([
            'name' => $request->name,
            'book' => $book_name
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
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
        if(fileExists(public_path($subject->book)))
        {
            unlink(public_path($subject->book));
        }
        $subject->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }

    public function getSubjectBook(Subject $subject)
    {
        $pdf = new Pdf(public_path($subject->book));
        $pdf->saveImage(public_path('files') . "/image.jpg");
        dd($subject);
        return $subject->book;
    }
}
