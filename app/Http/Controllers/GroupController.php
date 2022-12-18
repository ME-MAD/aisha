<?php

namespace App\Http\Controllers;

use App\DataTables\GroupDataTable;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Payment;
use App\Models\Student;
use App\Services\Group\GroupService;
use App\Services\GroupType\GroupTypeService;
use App\Services\Teacher\TeacherService;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GroupController extends Controller
{

    private $teacherService;
    private $groupTypeService;
    private $groupService;

    public function __construct(
        TeacherService $teacherService,
        GroupTypeService $groupTypeService,
        GroupService $groupService
    ) {
        $this->teacherService = $teacherService;
        $this->groupTypeService = $groupTypeService;
        $this->groupService = $groupService;
    }

    public function index(GroupDataTable $GroupDataTable)
    {
        $teaches = $this->teacherService->getAllTeachers();
        $groupTypes = $this->groupTypeService->getAllGroupTypes();

        return $GroupDataTable->render('pages.group.index', [
            'teachers' => $teaches,
            'groupTypes' => $groupTypes,
        ]);
    }

    public function create()
    {
    }

    public function store(StoreGroupRequest $request)
    {
        $this->groupService->createGroup($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group.index'));
    }

    public function show(Group $group)
    {
        $this->groupService->setGroupWithAllData($group);

        $countStudents = $this->groupService->getGroupStudentsCount();
        $groupDaysCount = $this->groupService->getGroupDaysCount();
        $groupTypeNumDays = $this->groupService->getGroupDaysNum();

        $students = Student::get();

        return view('pages.group.show', [
            'group' => $group,
            'countStudents' => $countStudents,
            'groupDaysCount' => $groupDaysCount,
            'groupTypeNumDays' => $groupTypeNumDays,
            'students' => $students,
            'currentMonth' => date('F'),
        ]);
    }

    public function edit(Group $group)
    {
    }

    public function update(UpdateGroupRequest $request, Group $group)
    {
        $this->groupService->updateGroup($group, $request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group.index'));
    }

    public function delete(Group $group)
    {
        $group->delete();

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getPaymentPerMonth(Group $group)
    {

        $paymentsChart = Payment::select(DB::raw("(SUM(amount)) as month_amount"), 'month')
            ->where('group_id', '=', $group->id)
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->get();

        $data = [];
        foreach (getMonthNames() as $monthName) {
            $data[$monthName] = $paymentsChart->where('month', $monthName)->first()->month_amount ?? 0;
        }

        return response()->json([
            'months' => array_keys($data),
            'values' => array_values($data),
        ]);
    }
}