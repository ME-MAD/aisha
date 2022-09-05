<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Http\Traits\ExperienceTrait;
use App\Http\Traits\TeacherTrait;
use App\Models\Teacher;
use RealRashid\SweetAlert\Facades\Alert;

class ExperienceController extends Controller
{
    use ExperienceTrait;
    use TeacherTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = $this->getExperiences();
        return view('pages.experience.index', [
            'experiences' => $experiences,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = Teacher::get();
        return view('pages.experience.create', [
            'teacher' => $teacher,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExperienceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperienceRequest $request)
    {


        Experience::create([
            'title' => $request->title,
            'date' => $request->date,
            'teacher_id' => $request->teacher_id
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.teacher.show', $request->teacher_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExperienceRequest  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $experience->update([
            'title' => $request->title,
            'date' => $request->date,
            
          
        ]);


        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function delete(Experience $experience)
    {
        $experience->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
