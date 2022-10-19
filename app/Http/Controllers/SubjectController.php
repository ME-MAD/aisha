<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Http\Traits\SubjectTrait;
use App\Services\PDFService;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use setasign\Fpdi\Fpdi;
use Spatie\PdfToImage\Pdf;

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

        $this->PDFService->explodePdfToImages($subject->book,$subject->name);

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
       
        if($book = $request->file('book'))
        {

            $book_name = $this->PDFService->uploadPdfFile(
                $book,
                $request->name,
                'subjects',
                null,
                'book'
            );
            $ext = $book->getClientOriginalExtension();
            $book_name = $request->name . "_book" . "." . $ext;
            $pathArray = explode('_',$book_name);
            $directory_name = array_shift($pathArray);
    
            if(file_exists(public_path($subject->book)))
            {
                unlink(public_path($subject->book));
            }

            if(File::exists(public_path('files/subjects/' . $directory_name . "/")))
            {
                File::deleteDirectory(public_path('files/subjects/' . $directory_name . "/"));
            }
            
            $book->move(public_path('files/subjects/'),$book_name);
        }
        else
        {
            $book_name = $request->name . "_book" . "." . "pdf";
            rename(
                public_path($subject->book), 
                public_path('files/subjects/' . $book_name)
            );

            rename(public_path('files/subjects/' . $subject->name . "/") , public_path('files/subjects/' . $request->name . "/"));
        }

        $subject->update([
            'name' => $request->name,
            'book' => $book_name
        ]);

        $pdf = new Pdf(public_path($subject->book));
        $numberOfPages = $pdf->getNumberOfPages();
        $path = public_path('files/subjects/' . $subject->name . "/");

        if(!File::exists($path)) 
        {
            File::makeDirectory($path, 0777, true, true);
        }

        for($i = 1; $i <= $numberOfPages; $i++)
        {
            $pdf->setPage($i)->setOutputFormat('jpg')->saveImage(public_path('files/subjects/' . $subject->name . "/") . $i . ".jpg");
        }

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
        $pathArray = explode('_',$subject->getRawOriginal('book'));
        $directory_name = array_shift($pathArray);

        if(file_exists(public_path($subject->book)))
        {
            unlink(public_path($subject->book));
        }

        if(File::exists(public_path('files/subjects/' . $directory_name . "/")))
        {
            File::deleteDirectory(public_path('files/subjects/' . $directory_name . "/"));
        }
        $subject->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }

    public function getSubjectBook(Subject $subject)
    {
        
    }
}
