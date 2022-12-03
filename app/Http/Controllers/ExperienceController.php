<?php

namespace App\Http\Controllers;

use App\DataTables\ExperienceDataTable;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Models\Experience;
use App\Models\Teacher;
use App\Services\Teacher\TeacherService;
use Illuminate\Http\Request as HttpRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ExperienceController extends Controller
{

    private $experienceDataTable;
    private $teacherService;

    public function __construct(ExperienceDataTable $experienceDataTable, TeacherService $teacherService)
    {
        $this->experienceDataTable = $experienceDataTable;
        $this->teacherService = $teacherService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers  = $this->teacherService->getAllTeachers();
        return $this->experienceDataTable->render('pages.experience.index', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'from' => $request->from,
            'to' => $request->to,
            'teacher_id' => $request->teacher_id
        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
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

        $teachers = Teacher::select(['id', 'name'])->get();
        return view('pages.experience.edit', [
            'teachers'  => $teachers,
            'experience'  => $experience,
        ]);
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
            'from' => $request->from,
            'to' => $request->to,
            'teacher_id' => $request->teacher_id,
        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
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
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}