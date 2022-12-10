<div class="modal fade" id="editGroup" tabindex="-1" role="dialog" aria-labelledby="editGroup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-warning ">
                <h5 class="modal-title text-white" id="editGroup">تعديل بيانات المجموعة</h5>
            </div>
            <div class="modal-body">
                <form id="editGroupForm" method="post">
                    @csrf
                    @method('PUT')
                    <x-time name="from" id="from_edit" label="من" id="from" class="text-warning" />

                    <x-time name="to" id="from_edit" label="إلى" id="to" class="text-warning" />



                    <div class="form-group row mb-4">
                        <label for="teacherId" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-warning"> اختر
                            المعلم</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select id="teacherId" class="form-control basic" style="width: 100%;" name="teacher_id">
                                <option value="">اختر المعلم</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">
                                        {{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-warning">نوع
                            المجموعة</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="group_type_id"
                                id="groupTypeId">
                                <option value="">اختر نوع
                                    المجموعة</option>
                                @foreach ($groupTypes as $groupType)
                                    <option value="{{ $groupType->id }}">
                                        {{ $groupType->name }}</option>
                                @endforeach
                            </select>
                            @error('group_type_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-warning">الفئه
                            العمرية</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="age_type" id="ageType">
                                <option value="kid">kid
                                </option>
                                <option value="adult">
                                    adult</option>
                            </select>
                            @error('age_type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Save</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>