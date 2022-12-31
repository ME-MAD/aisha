<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Student;
use App\Services\Note\NoteService;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Note\StoreNoteRequest;
use App\Http\Requests\Note\UpdateNoteRequest;
use App\Models\Teacher;
use GuzzleHttp\Promise\Create;

class NoteStudentController extends Controller
{

    public function index()
    {
        // return view('pages.student.notes');
    }


    public function getStudentsNotesByAjax()
    {
        $data = Note::where('notable_type', Student::class)->get();
        return response()->json([
            'data' => $data
        ]);
    }



    public function getNurseryStaffDetails($request)
    {
        dd($request->all());

        $perPage    = 4;
        $pageNumber = request('page_number');

        $query = $this->nurseryDetailsService->run($request->type);

        $pagesCount = intval($query->count() / $perPage);

        $data = $query->offset(($pageNumber - 1) * 4)->limit($perPage)->get();

        return response()->json([
            'data'       => $data,
            'pagesCount' => $pagesCount
        ]);
    }

























    public function getDataStudentsByAjax()
    {
        $data = Student::select(['id', 'name'])->get();
        return response()->json([
            'students' => $data,
            'types'     => Note::TYPE
        ]);
    }


    public function store(StoreNoteRequest $request)
    {

        dd($request->all());
        Note::create([
            'note' => $request->note,
            'type' => $request->type,

            'notby_type' => Teacher::class,
            'notby_id' => 1, //Auth Teacher id

            'notable_type' => Student::class,
            // 'notable_id' => 2, //Student id
            'notable_id' => $request->student_id, //Student id
        ]);


        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.note_students.index'));
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
        return $note;
        // $note->delete();

        // Alert::toast('تمت العملية بنجاح', 'success');
        // return redirect()->back();
    }
}
