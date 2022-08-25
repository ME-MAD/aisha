<?php


namespace App\Http\Traits;

use App\Models\Subject;


trait SubjectTrait
{
    private function getUsersDesc()
    {
        return Subject::orderBy('id', 'DESC')->get();
    }

    private function getSubject()
    {
        return Subject::get();
    }
}
