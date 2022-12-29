<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Note\StoreNoteRequest;
use App\Http\Requests\Note\UpdateNoteRequest;
use App\Models\Teacher;
use App\Services\Note\NoteService;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }



    public function index()
    {
        $test = Note::where('notable_type', Student::class)->with(['student'])->get();
        return view('pages.student.notes');
    }

    // public function getStudentsNotesByAjax()
    // {
    //     $data = Note::where('notable_type', Student::class)->get();
    //     return response()->json([
    //         'data' => $data
    //     ]);
    // }

    public function getStaffDetails()
    {
        $data = Student::select(['id', 'name'])->get();
        return response()->json([
            'students' => $data,
            'types'    => Note::TYPE
        ]);
    }

    public function getNotesStaffDetails(Request $request)
    {
        $perPage    = $request->number_products;
        $pageNumber = $request->page_number;

        $query = $this->noteService->run($request->type);

        $pagesCount = intval($query->count() / $perPage);

        $data = $query->offset(($pageNumber - 1) * 4)->limit($perPage)->get();


        return response()->json([
            'data'       => $data,
            'pagesCount' => $pagesCount
        ]);
    }

    //-------------------------------------------------------------







    public function store(StoreNoteRequest $request)
    {

        Note::create([
            'note' => $request->note,
            'type' => $request->type,

            'notby_type' => Teacher::class,
            'notby_id' => 1, //Auth Teacher id

            'notable_type' => Student::class,
            // 'notable_id' => 2, //Student id
            'notable_id' => $request->notable_id, //Student id
        ]);


        return response()->json([
            'alert'    => 'success',
            'title'    => 'نجحت',
            'message'  => 'تمت العملية بنجاح'
        ]);
    }

    public function show(Note $note)
    {
        // $post = Student::find(2);
        // $post->notes;

        // dd($post);
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        $note->update([
            'note' => $request->note,
            'type' => $request->type
        ]);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.note_students.index'));
    }

    public function delete(Note $note)
    {

        $note->delete();

        return response()->json([
            'alert'    => 'success',
            'title'    => 'نجحت',
            'message'  => 'تمت العملية بنجاح'
        ]);
    }
}
