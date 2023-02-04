<?php

namespace App\Http\Controllers;

use App\DataTables\ExperienceDataTable;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Http\Traits\AuthTrait;
use App\Models\Experience;
use App\Services\Experience\ExperienceService;
use App\Services\Teacher\TeacherService;
use Illuminate\Support\Benchmark;
use RealRashid\SweetAlert\Facades\Alert;

class ExperienceController extends Controller
{

    use AuthTrait;

    private ExperienceDataTable $experienceDataTable;
    private TeacherService $teacherService;
    private ExperienceService $experienceService;

    public function __construct(
        ExperienceDataTable $experienceDataTable,
        TeacherService      $teacherService,
        ExperienceService   $experienceService)
    {
        $this->experienceDataTable = $experienceDataTable;
        $this->teacherService = $teacherService;
        $this->experienceService = $experienceService;

        $this->handlePermissions([
            'index' => 'index-experience',
            'store' => 'store-experience',
            'update' => 'update-experience',
            'delete' => 'delete-experience',
        ]);

    }

    public function index()
    {
        $teachers = $this->teacherService->getAllTeachers();

        return $this->experienceDataTable->render('pages.experience.index', [
            'teachers' => $teachers,
        ]);
    }

    public function store(StoreExperienceRequest $request)
    {
        $this->experienceService->createExperience($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $this->experienceService->updateExperience($experience, $request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(Experience $experience)
    {
        $this->experienceService->deleteExperience($experience);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}
