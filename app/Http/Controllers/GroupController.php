<?php

namespace App\Http\Controllers;

use App\DataTables\GroupDataTable;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Models\Group;
use App\Models\GroupType;
use App\Models\Role;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Services\Group\GroupService;
use App\Services\HomeService;
use App\Services\Payment\PaymentChartService;
use App\Services\Permission\PermissionService;
use RealRashid\SweetAlert\Facades\Alert;

class GroupController extends Controller
{
    private GroupService $groupService;
    private PaymentChartService $paymentChartService;
    private HomeService $homeService;
    private PermissionService $permissionService;

    public function __construct(
        GroupService        $groupService,
        PaymentChartService $paymentChartService,
        HomeService $homeService,
        PermissionService $permissionService
    ) {
        $this->groupService = $groupService;
        $this->paymentChartService = $paymentChartService;
        $this->homeService = $homeService;
        $this->permissionService = $permissionService;


        $this->permissionService->handlePermissions($this, [
            'index' => 'index-group',
            'store' => 'store-group',
            'update' => 'update-group',
            'show' => 'show-group',
            'delete' => 'delete-group',
        ]);
    }

    public function index(GroupDataTable $GroupDataTable)
    {
        $teachers = Teacher::teachers()->select([
            'id', 'name'
        ])->get();
        $groupTypes = GroupType::select(['id', 'name'])->get();

        return $GroupDataTable->render('pages.group.index', [
            'teachers' => $teachers,
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
        $this->groupService->getGroupWithAllData($group);

        $groupPaymentsCount = $group->payments()
            ->where('paid', true)
            ->where('month', getCurrectMonthName())->count();

        $students = Student::students()->select(['id', 'name'])->get();
        $subjects = Subject::select(['id', 'name'])->get();

        $roles = Role::select(['name'])->get();

        return view('pages.group.show', [
            'group' => $group,
            'countStudents' => $group->groupStudents->count(),
            'countSubjects' => $group->groupSubjects->count(),
            'groupDaysCount' => $group->groupDays->count(),
            'groupTypeNumDays' => $group->groupType->days_num ?? 0,
            'groupPaymentsCount' => $groupPaymentsCount,
            'students' => $students,
            'subjects' => $subjects,
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
            ->paid()
            ->getForChart();

        return response()->json([
            'months' => array_keys($this->paymentChartService->getForChart()),
            'values' => array_values($this->paymentChartService->getForChart()),
        ]);
    }

    public function getAllGroupsForPayment()
    {
        $groups = Group::with([
            'students' => function ($q) {
                return $q->select(['students.id', 'students.name'])->with('payments:id,student_id,group_id,month,paid');
            },
            'groupType:id,price',
            'payments:id,group_id,paid,month'
        ])->select([
            'id', 'name', 'group_type_id'
        ])->get();


        $this->groupService->appendAllStudentsPaidToGroups($groups);

        foreach ($groups as $group) {
            foreach ($group->students as $student) {
                $student->paidThisMonth = $student->checkPaid($group->id, getCurrectMonthName());
            }
        }

        return response()->json([
            'status' => 200,
            'groups' => $groups,
            'currentMonth' => getCurrectMonthName()
        ]);
    }

    public function groupAgesChartData()
    {
        $groupsCountsData = $this->homeService->getGroupsCountsData();

        return response()->json([
            'data' => [
                [
                    'name' => trans('main.kids'),
                    'value' => $groupsCountsData['groupKidsCount']
                ],
                [
                    'name' => trans('main.adults'),
                    'value' => $groupsCountsData['groupAdultCount']
                ],
            ],
            'allGroupsCount' => $groupsCountsData['allGroupsCount'],
            'total_count' => trans('main.adults'),
        ]);
    }
}
