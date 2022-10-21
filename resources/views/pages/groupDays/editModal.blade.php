<div class="modal fade" id="editGroupDay" tabindex="-1" role="dialog" aria-labelledby="editGroupDay" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-warning text-dark">
                <h5 class="modal-title text-white" id="editGroupDay">تعديل أيام المجموعة</h5>
            </div>
            <div class="modal-body">
                <form id="editGroupDayForm" method="post">
                    @csrf
                    @method('PUT')

                    {{-- <div class="form-group row mb-4">
                        <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary"> اختر
                            المجموعه</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic chickgroup" style="width: 100%;" name="group_id"
                                id="group_id" data-href="{{ route('admin.group_day.getDaysOfGroup') }}">
                                <option value="">اختر اسم المجموعه</option>
                                @foreach ($groups as $group)
                                    @if (!$group->checkIfGroupExceededGroupDaysLimit())
                                        <option value="{{ $group->id }}">
                                            {{ $group->from }} :
                                            {{ $group->to }} -
                                            {{ $group->groupType->days_num }} Namber Days :
                                            Remainging
                                            {{ $group->getRemainingGroupDaysCount() }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('group_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> --}}

                    <x-time name="group" label="من " id="groupform" />
                    <x-time name="group" label="إلى" id="groupto" />

                    <div class="form-group row mb-4">
                        <label for="day" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">
                            اليوم</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="day" id="day">
                                <option value="Monday">Monday</option>

                                <option value="Tuesday">Tuesday
                                </option>

                                <option value="Wednesday">
                                    Wednesday</option>

                                <option value="Thursday">Thursday
                                </option>

                                <option value="Friday">Friday</option>

                                <option value="Saturday">Saturday
                                </option>

                                <option value="Sunday">Sunday
                                </option>


                            </select>
                            @error('day')
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
