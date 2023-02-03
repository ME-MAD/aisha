<?php

namespace App\Http\Controllers;

use App\DataTables\GroupTypeDataTable;
use App\Http\Requests\GroupType\StoreGroupTypeRequest;
use App\Http\Requests\GroupType\UpdateGroupTypeRequest;
use App\Http\Traits\AuthTrait;
use App\Models\GroupType;
use App\Services\GroupType\GroupTypeService;
use RealRashid\SweetAlert\Facades\Alert;

class GroupTypeController extends Controller
{
    use AuthTrait;

    private GroupTypeDataTable $groupTypeDataTable;
    private GroupTypeService $groupTypeService;

    public function __construct(
        GroupTypeDataTable $groupTypeDataTable,
        GroupTypeService   $groupTypeService
    )
    {
        $this->groupTypeDataTable = $groupTypeDataTable;
        $this->groupTypeService = $groupTypeService;


        $this->handlePermissions([
            'index' => 'index-groupStudent',
            'store' => 'store-groupStudent',
            'update' => 'update-groupStudent',
            'delete' => 'delete-groupStudent',
        ]);
    }

    public function index()
    {
        return $this->groupTypeDataTable->render('pages.groupType.index');
    }

    public function store(StoreGroupTypeRequest $request)
    {
        $this->groupTypeService->createGroupType($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group_types.index'));
    }

    public function update(UpdateGroupTypeRequest $request, GroupType $group_type)
    {
        $this->groupTypeService->updateGroupType($group_type, $request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group_types.index'));
    }

    public function delete(GroupType $group_type)
    {
        $this->groupTypeService->deleteGroupType($group_type);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}
