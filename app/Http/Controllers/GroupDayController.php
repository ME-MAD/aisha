<?php

namespace App\Http\Controllers;

use App\DataTables\GroupDayDataTable;
use App\Http\Requests\GroupDay\StoreGroupDayRequest;
use App\Http\Traits\AuthTrait;
use App\Models\GroupDay;
use App\Services\Group\GroupService;
use App\Services\GroupDay\GroupDayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GroupDayController extends Controller
{
    use AuthTrait;

    private GroupDayDataTable $groupDayDataTable;
    private GroupDayService $groupDayService;
    private GroupService $groupService;

    public function __construct(
        GroupDayDataTable $groupDayDataTable,
        GroupDayService   $groupDayService,
        GroupService      $groupService
    )
    {
        $this->groupDayDataTable = $groupDayDataTable;
        $this->groupDayService = $groupDayService;
        $this->groupService = $groupService;


        $this->handlePermissions([
            'index' => 'index-groupDay',
            'store' => 'store-groupDay',
            'update' => 'update-groupDay',
            'delete' => 'delete-groupDay',
        ]);
    }

    public function index()
    {
        return $this->groupDayDataTable->render('pages.groupDays.index', [
            'groups' => $this->groupService->getAllGroups(),
        ]);
    }

    public function store(StoreGroupDayRequest $request)
    {
        $this->groupDayService->createGroupDay($request);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(GroupDay $groupDay)
    {
        $this->groupDayService->deleteGroupDay($groupDay);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getGroupDaysOfGroup(Request $request): JsonResponse
    {
        return response()->json([
            'groupDays' => $this->groupDayService->getGroupDaysOfGroup($request->group_id),
        ]);
    }
}
