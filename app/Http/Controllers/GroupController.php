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
use App\Services\HomeService;
use App\Services\Payment\PaymentChartService;
use App\Services\Permission\PermissionService;
use App\Services\Role\RoleService;
use App\Services\Teacher\TeacherService;
use RealRashid\SweetAlert\Facades\Alert;

class GroupController extends Controller
{
    private TeacherService $teacherService;
    private GroupTypeService $groupTypeService;
    private GroupService $groupService;
    private PaymentChartService $paymentChartService;
    private RoleService $roleService;
    private HomeService $homeService;
    private PermissionService $permissionService;

    public function __construct(
        TeacherService      $teacherService,
        GroupTypeService    $groupTypeService,
        GroupService        $groupService,
        PaymentChartService $paymentChartService,
        RoleService $roleService,
        HomeService $homeService,
        PermissionService $permissionService
    )
    {
        $this->teacherService = $teacherService;
        $this->groupTypeService = $groupTypeService;
        $this->groupService = $groupService;
        $this->paymentChartService = $paymentChartService;
        $this->roleService = $roleService;
        $this->homeService = $homeService;
        $this->permissionService = $permissionService;


        $this->permissionService->handlePermissions($this,[
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
        $groupPaymentsCount = $this->groupService->getGroupPaymentsCount();
        $groupDaysCount = $this->groupService->getGroupDaysCount();
        $groupTypeNumDays = $this->groupService->getGroupDaysNum();

        $students = Student::get();

        $roles = $this->roleService->getRoles(['name']);

        return view('pages.group.show', [
            'group' => $group,
            'countStudents' => $countStudents,
            'groupDaysCount' => $groupDaysCount,
            'groupTypeNumDays' => $groupTypeNumDays,
            'groupPaymentsCount' => $groupPaymentsCount,
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

    public function getAllGroupsForPayment()
    {
        $groups = Group::with([
            'students' => function($q){
                return $q->select(['students.id','students.name'])->with('payments:id,student_id,group_id,month,paid');
            },
            'groupType:id,price',
            'payments:id,group_id,paid,month'
        ])->select([
            'id','name','group_type_id'
        ])->get();


        $this->groupService->appendAllStudentsPaidToGroups($groups);

        foreach($groups as $group)
        {
            foreach($group->students as $student)
            {
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
                    'name' => 'kids',
                    'value' => $groupsCountsData['groupKidsCount']
                ],
                [
                    'name' => 'adults',
                    'value' => $groupsCountsData['groupAdultCount']
                ],
            ],
            'allGroupsCount' => $groupsCountsData['allGroupsCount'],
            'words' => [
                'groups' => __('home.Groups'),
                "group_kids_count" => "Group Kids Count" . " " . $groupsCountsData['groupKidsCount'],
                "group_adult_count" => "Group Adults Count"  . " " . $groupsCountsData['groupAdultCount'],
            ]
        ]);
    }
}
