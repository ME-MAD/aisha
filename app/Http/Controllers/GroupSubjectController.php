<?php

namespace App\Http\Controllers;

use App\DataTables\GroupSubjectDataTable;
use App\Http\Requests\GroupSubject\StoreGroupSubjectRequest;
use App\Http\Requests\GroupSubject\UpdateGroupSubjectRequest;
use App\Models\GroupSubject;
use App\Services\Group\GroupService;
use App\Services\GroupSubject\GroupSubjectService;
use App\Services\Permission\PermissionService;
use App\Services\Subject\SubjectService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GroupSubjectController extends Controller
{
    private GroupSubjectService $groupSubjectService;
    private GroupService        $groupService;
    private SubjectService      $SubjectService;
    private PermissionService   $permissionService;

    public function __construct(
        GroupSubjectService $groupSubjectService,
        GroupService        $groupService,
        SubjectService      $SubjectService,
        PermissionService   $permissionService
    )
    {
        $this->groupSubjectService = $groupSubjectService;
        $this->groupService = $groupService;
        $this->SubjectService = $SubjectService;
        $this->permissionService = $permissionService;


        $this->permissionService->handlePermissions($this,[
            'index' => 'index-groupSubject',
            'store' => 'store-groupSubject',
            'delete' => 'delete-groupSubject',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GroupSubjectDataTable $GroupSubjectDataTable)
    {
        return $GroupSubjectDataTable->render('pages.groupSubject.index', [
            'groups' => $this->groupService->getAllGroups(),
            'subjects' => $this->SubjectService->getAllSubjects(['id', 'name']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupSubjectRequest $request)
    {
        $this->groupSubjectService->createGroupSubject($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupSubject  $groupSubject
     * @return \Illuminate\Http\Response
     */
    public function show(GroupSubject $groupSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupSubject  $groupSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupSubject $groupSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupSubjectRequest  $request
     * @param  \App\Models\GroupSubject  $groupSubject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupSubjectRequest $request, GroupSubject $groupSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupSubject  $groupSubject
     * @return \Illuminate\Http\Response
     */
    public function delete(GroupSubject $groupSubject)
    {
        $this->groupSubjectService->deleteGroupSubject($groupSubject);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getGroupSubjects(Request $request)
    {
        return response()->json([
            'groupSubjects' => $this->groupSubjectService->getGroupSubjectsOfGroup($request->group_id)
        ]);
    }
}
