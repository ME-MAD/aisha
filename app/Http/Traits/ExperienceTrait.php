<?php


namespace App\Http\Traits;


use App\Models\Experience;

trait ExperienceTrait
{
    private function getExperiences()
    {
      return Experience::select(['id','title','date','teacher_id'])
            ->with('teacher:id,name')
            ->get();
    }
}
