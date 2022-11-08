<?php


namespace App\Http\Traits;

use App\Models\Teacher;

trait TeacherTrait
{
    private function getTeachersDesc()
    {
        return Teacher::orderBy('id', 'DESC')->get();
    }

    private function getTeachers()
    {
        return Teacher::get();
    }

    // public function makeImagecreate($request)
    // {
    //     if ($image = $request->file('avatar')) {
    //         $fileName = now()->timestamp . "_" . $image->getClientOriginalName();
    //         $image->move(Teacher::AVATARS_PATH, $fileName);
    //     }
    //     return $fileName;
    //     // dump($fileName);
    // }
}