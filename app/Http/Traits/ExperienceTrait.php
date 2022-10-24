<?php


namespace App\Http\Traits;


use App\Models\Experience;

trait ExperienceTrait
{
  private function getExperiences()
  {
    return Experience::select(['id', 'title', 'from', 'to', 'teacher_id'])
      ->with('teacher:id,name')
      ->get();
  }
}