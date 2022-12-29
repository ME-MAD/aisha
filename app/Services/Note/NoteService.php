<?php

namespace App\Services\Note;

use App\Models\Note;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;

class NoteService
{

    public function createNote(object $request)
    {
        return Note::create([
            'notable_id'   => $request->notable_id,
            'notable_type' => Note::class,
            'auther_id'    => 1,
            'note'         => $request->note,
            'type'         => $request->type,
        ]);
    }


    public function updateNote(Note $note, object $request)
    {
        return $note->update([
            'notable_id'   => $request->notable_id,
            'notable_type' => Note::class,
            'auther_id'    => 1,
            'note'         => $request->note,
            'type'         => $request->type,
        ]);
    }

    public function deleteNote(Note $note)
    {
        return $note->delete();
    }



    public function run(string $type)
    {
        return $this->$type();
    }

    private function teacher()
    {
        return Note::where('notable_type', Teacher::class);
    }

    private function student()
    {
        // return Note::where('notable_type', Student::class)->with(['student'])->get();
        $test = Note::where('notable_type', Student::class)->with(['student'])->get();

        dd($test);
    }

    private function subject()
    {
        return Note::where('notable_type', Subject::class);
    }

    //----------------------------------------------------------------
    //----------------------------------------------------------------



    //----------------------------------------------------------------
    // public function getDataStudentsByAjax()
    // {
    //     $data = Student::select(['id', 'name'])->get();
    //     return response()->json([
    //         'students' => $data,
    //         'types'    => Note::TYPE
    //     ]);
    // }

}
