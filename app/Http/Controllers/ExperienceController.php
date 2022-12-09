<?php

namespace App\Http\Controllers;

use App\DataTables\ExperienceDataTable;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Models\Experience;
use App\Models\Teacher;
use App\Services\Experience\ExperienceService;
use App\Services\Teacher\TeacherService;
use Illuminate\Http\Request as HttpRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ExperienceController extends Controller
{

    private $experienceDataTable;
    private $teacherService;
    private $experienceService;

    public function __construct(
        ExperienceDataTable $experienceDataTable,
        TeacherService $teacherService,
        ExperienceService $experienceService
     )
    {
        $this->experienceDataTable = $experienceDataTable;
        $this->teacherService = $teacherService;
        $this->experienceService = $experienceService;
    }
    
    public function index()
    {
        $teachers  = $this->teacherService->getAllTeachers();

        return $this->experienceDataTable->render('pages.experience.index', [
            'teachers' => $teachers,
        ]);
    }

    public function create()
    {

    }

    public function store(StoreExperienceRequest $request)
    {
        $this->experienceService->createExperience($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function show(Experience $experience)
    {
    }

    public function edit(Experience $experience)
    {
        
    }

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

    public function delete(Experience $experience)
    {
        $experience->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}