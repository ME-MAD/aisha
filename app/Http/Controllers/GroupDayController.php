<?php

namespace App\Http\Controllers;

use App\DataTables\GroupDayDataTable;
use App\Models\GroupDay;
use App\Http\Requests\GroupDay\StoreGroupDayRequest;
use App\Http\Requests\GroupDay\UpdateGroupDayRequest;
use App\Models\Group;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GroupDayController extends Controller
{
    public function index(GroupDayDataTable $groupDayDataTable)
    {
        $groupdays = GroupDay::select(['id', 'group_id', 'day'])
            ->with('group:id,from,to')
            ->get();
        $groups = Group::get();

        return $groupDayDataTable->render('pages.groupDays.index', [
            'groupdays' => $groupdays,
            'groups' => $groups,

        ]);
    }

    public function create()
    {
        
    }

    public function store(StoreGroupDayRequest $request)
    {
        GroupDay::create([
            'group_id' => $request->group_id,
            'day' => $request->day,
        ]);

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
        $groupDay->update([
            'group_id' => $request->group_id,
            'day' => $request->day,
        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group_day.index'));
    }

    public function delete(GroupDay $groupDay)
    {
        $groupDay->delete();
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