<?php

namespace App\Http\Controllers;

use App\Models\GroupType;
use App\Http\Requests\GroupType\StoreGroupTypeRequest;
use App\Http\Requests\GroupType\UpdateGroupTypeRequest;
use App\Http\Traits\GroupTrait;
use App\Http\Traits\GroupTypeTrait;
use App\Models\Group;
use RealRashid\SweetAlert\Facades\Alert;

class GroupTypeController extends Controller
{

    use GroupTypeTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grouptypes = $this->getGroupType();
        return view('pages.groupType.index', [
            "grouptypes" => $grouptypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.groupType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupTypeRequest $request)
    {
        $price = str_replace(['$', '_', ','], ['', '0', ''], $request->price);
        GroupType::create([
            'name' => $request->name,
            'days_num' => $request->demo_vertical,
            'price' => $price,
        ]);

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.group_types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function show(GroupType $groupType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupType $group_type)
    {
        return view('pages.groupType.edit', [
            "group_type" => $group_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupTypeRequest  $request
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupTypeRequest $request, GroupType $group_type)
    {

        $group_type->update([

            'name' => $request->name,
            'days_num' => $request->demo_vertical,
            'price' => $request->price,

        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.group_types.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function delete(GroupType $group_type)
    {
        $group_type->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
