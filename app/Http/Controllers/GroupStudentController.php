<?php

namespace App\Http\Controllers;

use App\DataTables\GroupStudentDataTable;
use App\Http\Requests\GroupStudent\StoreGroupStudentRequest;
use App\Http\Traits\AuthTrait;
use App\Models\GroupStudent;
use App\Services\Group\GroupService;
use App\Services\GroupStudent\GroupStudentService;
use App\Services\Student\StudentService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GroupStudentController extends Controller
{
    use AuthTrait;

    private GroupStudentService $groupStudentService;
    private GroupService $groupService;
    private StudentService $StudentService;

    public function __construct(
        GroupStudentService $groupStudentService,
        GroupService        $groupService,
        StudentService      $StudentService,
    )
    {
        $this->groupStudentService = $groupStudentService;
        $this->groupService = $groupService;
        $this->StudentService = $StudentService;


        $this->handlePermissions([
            'index' => 'index-groupDay',
            'store' => 'store-groupDay',
            'update' => 'update-groupDay',
            'delete' => 'delete-groupDay',
        ]);
    }

    public function index(GroupStudentDataTable $GroupStudentDataTable)
    {
        return $GroupStudentDataTable->render('pages.groupStudent.index', [
            'groups' => $this->groupService->getAllGroups(),
            'students' => $this->StudentService->getAllStudent(),
        ]);
    }

    public function store(StoreGroupStudentRequest $request)
    {
        $this->groupStudentService->createGroupStudent($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(GroupStudent $groupStudent)
    {
        $this->groupStudentService->deleteGroupStudent($groupStudent);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }


    public function getGroupStudents(Request $request)
    {
        return response()->json([
            'groupStudents' => $this->groupStudentService->getGroupStudentsOfGroup($request->group_id)
        ]);
    }
}
