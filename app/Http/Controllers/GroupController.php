<?php

namespace App\Http\Controllers;

use App\DataTables\GroupDataTable;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Http\Traits\AuthTrait;
use App\Models\Group;
use App\Models\Student;
use App\Services\Group\GroupService;
use App\Services\GroupType\GroupTypeService;
use App\Services\Payment\PaymentChartService;
use App\Services\Role\RoleService;
use App\Services\Teacher\TeacherService;
use RealRashid\SweetAlert\Facades\Alert;

class GroupController extends Controller
{
    use  AuthTrait;

    private TeacherService $teacherService;
    private GroupTypeService $groupTypeService;
    private GroupService $groupService;
    private PaymentChartService $paymentChartService;
    private RoleService $roleService;

    public function __construct(
        TeacherService      $teacherService,
        GroupTypeService    $groupTypeService,
        GroupService        $groupService,
        PaymentChartService $paymentChartService,
        RoleService $roleService
    )
    {
        $this->teacherService = $teacherService;
        $this->groupTypeService = $groupTypeService;
        $this->groupService = $groupService;
        $this->paymentChartService = $paymentChartService;
        $this->roleService = $roleService;


        $this->handlePermissions([
            'index' => 'index-group',
            'store' => 'store-group',
            'update' => 'update-group',
            'show' => 'show-group',
            'delete' => 'delete-group',
        ]);
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

        $roles = $this->roleService->getRoles(['name']);

        return view('pages.group.show', [
            'group' => $group,
            'countStudents' => $countStudents,
            'groupDaysCount' => $groupDaysCount,
            'groupTypeNumDays' => $groupTypeNumDays,
            'students' => $students,
            'currentMonth' => getCurrectMonthName(),
            'roles' => $roles,
        ]);
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

        $this->paymentChartService->sumOfAmountAndMonth()
            ->fromGroup($group->id)
            ->year(date('Y'))
            ->getForChart();

        return response()->json([
            'months' => array_keys($this->paymentChartService->getForChart()),
            'values' => array_values($this->paymentChartService->getForChart()),
        ]);
    }
}
