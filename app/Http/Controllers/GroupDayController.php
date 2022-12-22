<?php

namespace App\Http\Controllers;

use App\DataTables\GroupDayDataTable;
use App\Models\GroupDay;
use App\Http\Requests\GroupDay\StoreGroupDayRequest;
use App\Http\Requests\GroupDay\UpdateGroupDayRequest;
use App\Models\Group;
use App\Services\GroupDay\GroupDayService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GroupDayController extends Controller
{

    private $groupDayDataTable;
    private $groupDayService;

    public function __construct(
        GroupDayDataTable $groupDayDataTable,
        GroupDayService $groupDayService
    ) {
        $this->groupDayDataTable = $groupDayDataTable;
        $this->groupDayService          = $groupDayService;
    }

    public function index()
    {
        $groups    = Group::get();

        return $this->groupDayDataTable->render('pages.groupDays.index', [
            'groups'    => $groups,
        ]);
    }

    public function store(StoreGroupDayRequest $request)
    {
        $this->groupDayService->createGroupDay($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function update(UpdateGroupDayRequest $request, GroupDay $groupDay)
    {
        $this->groupDayService->updateGroupDay($groupDay, $request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group_day.index'));
    }

    public function delete(GroupDay $groupDay)
    {
        $this->groupDayService->deleteGroupDay($groupDay);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getDaysOfGroup(Request $request)
    {
        $groupDays = GroupDay::where('group_id', $request->group_id)->select(['group_id', 'day'])->get();

        return response()->json([
            'groupDays' => $groupDays
        ]);
    }
}