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
    private $groupDay;

    public function __construct(
        GroupDayDataTable $groupDayDataTable,
        GroupDayService $groupDay
    ) {
        $this->groupDayDataTable = $groupDayDataTable;
        $this->groupDay          = $groupDay;
    }

    public function index()
    {
        $groupdays = GroupDay::select(['id', 'group_id', 'day'])->with('group:id,from,to')->get();
        $groups    = Group::get();

        return $this->groupDayDataTable->render('pages.groupDays.index', [
            'groupdays' => $groupdays,
            'groups'    => $groups,
        ]);
    }

    public function create()
    {
    }

    public function store(StoreGroupDayRequest $request)
    {
        $this->groupDay->createGroupDay($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function show(GroupDay $groupDay)
    {
        //
    }

    public function edit(GroupDay $groupDay)
    {
    }

    public function update(UpdateGroupDayRequest $request, GroupDay $groupDay)
    {
        $this->groupDay->updateGroupDay($groupDay, $request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group_day.index'));
    }

    public function delete(GroupDay $groupDay)
    {
        $this->groupDay->deleteGroupDay($groupDay);

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
