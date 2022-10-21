<?php

namespace App\Http\Controllers;

use App\DataTables\GroupDayDataTable;
use App\Models\GroupDay;
use App\Http\Requests\GroupDay\StoreGroupDayRequest;
use App\Http\Requests\GroupDay\UpdateGroupDayRequest;
use App\Models\Group;
use App\Http\Traits\GroupDayTrait;
use App\Http\Traits\GroupTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class GroupDayController extends Controller
{
    use GroupDayTrait;
    use GroupTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GroupDayDataTable $groupDayDataTable)
    {
        $groupdays = $this->getGroupDays();
        $groups = Group::get();

        return $groupDayDataTable->render('pages.groupDays.index', [
            'groupdays' => $groupdays,
            'groups' => $groups,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $groups = Group::with(['groupType', 'groupDays'])->get();



        // return view('pages.groupDays.create', [
        //     'groups' => $groups,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupDayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupDayRequest $request)
    {
        GroupDay::create([
            'group_id' => $request->group_id,
            'day' => $request->day,
        ]);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group_day.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupDay  $groupDay
     * @return \Illuminate\Http\Response
     */
    public function show(GroupDay $groupDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupDay  $groupDay
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupDay $groupDay)
    {
        // $groups = $this->getGroups();
        // return view('pages.groupDays.edit', [
        //     'groupDay'  => $groupDay,
        //     'groups'  => $groups,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupDayRequest  $request
     * @param  \App\Models\GroupDay  $groupDay
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupDayRequest $request, GroupDay $groupDay)
    {
        $groupDay->update([
            'group_id' => $request->group_id,
            'day' => $request->day,
        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group_day.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupDay  $groupDay
     * @return \Illuminate\Http\Response
     */
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