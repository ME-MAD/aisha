<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Http\Traits\SubjectTrait;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    use SubjectTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->getSubject();

        return view('pages.subject.index',[
            'subjects' => $subjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.subject.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        Subject::create([
            'name' => $request->name,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.subject.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('pages.subject.edit',[
            'subject' => $subject
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update([
            'name' => $request->name
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.subject.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function delete(Subject $subject)
    {
        $subject->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
