<?php


namespace App\Http\Traits;

use App\Models\Exam;

trait ExamTrait
{
    private function getExamsDesc()
    {
        return Exam::orderBy('id', 'DESC')->get();
        
    }

    private function getExams()
    {
        return Exam::get();
    }
}