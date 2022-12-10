<?php

namespace App\Services\Experience;

use App\Models\Experience;

class ExperienceService
{
    public function createExperience(object $request)
    {
        return Experience::create([
            'title' => $request->title,
            'from' => $request->from,
            'to' => $request->to,
            'teacher_id' => $request->teacher_id
        ]);
    }

    public function updateExperience(Experience $experience, object $request)
    {
        return $experience->update([
            'title' => $request->title,
            'from' => $request->from,
            'to' => $request->to,
            'teacher_id' => $request->teacher_id,
        ]);
    }

    public function deleteExperience(Experience $experience)
    {
        return $experience->delete();
    }
}