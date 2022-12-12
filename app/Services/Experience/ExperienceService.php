<?php

namespace App\Services\Experience;

use App\Models\Experience;
use DateTime;

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

    public function getCountOfExperienceYears($experiences)
    {
        $years = 0;
        $months = 0;
        $days = 0;

        foreach ($experiences as $experience) {
            $from = new DateTime($experience->from);
            $to = new DateTime($experience->to);
            $years += $from->diff($to)->y;
            $months += $from->diff($to)->m;
            $days += $from->diff($to)->d;
        }

        while ($days > 30) {
            $months += 1;
            $days -= 30;
        }
        while ($months > 11) {
            $months -= 12;
            $years += 1;
        }
        
        return $years;
    }
}