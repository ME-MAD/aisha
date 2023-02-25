<div class="modal fade" id="creatGroupSubjectModal" tabindex="-1" role="dialog" aria-labelledby="creatGroupSubjectModal"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-titlefont-weight-bold text-capitalize text-light" id="creatGroupSubjectModal">
                   إضافه مادة للمجموعة
                </h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.group_subjects.store') }}" method="post">
                    @csrf
                    <div class="row">
                        @if (!isset($group))
                            <div class="col-6">
                        @else
                            <div class="col-12">
                        @endif
                            <div class="form-group row mb-4">
                                <label for="age_type"
                                       class="col-xl-12 col-md-6  col-form-label text-dark text-capitalize font-weight-bold">
                                  اختر الماده
                                    <i class="fa-solid fa-star-of-life required-star"></i>
                                </label>
                                <div class="col-xl-12 col-md-6">
                                    <select class="form-control basic" style="width: 100%;" name="subject_id" id="subject_id">
                                        <option value=""> اختر الماده للمجموعة</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                    {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                                    {{ $subject->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            @if (!isset($group))
                            <div class="form-group row mb-4">
                                <label for="age_type"
                                       class="col-xl-12 col-md-6  col-form-label text-dark text-capitalize font-weight-bold">
                                    {{ __('group.Choose group') }}
                                    <i class="fa-solid fa-star-of-life required-star"></i>
                                </label>
                                <div class="col-xl-12 col-md-6">
                                    <select class="form-control basic" style="width: 100%;" name="group_id" id="group_id"
                                            data-href="{{ route('admin.group_subjects.getGroupSubjects') }}">
                                        <option value=""> {{ __('group.Choose group') }}</option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}"
                                                    {{ old('group_id') == $group->id ? 'selected' : '' }}>
                                                {{ $group->name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('group_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @else
                            <input type="hidden" name="group_id" id="group_id" value="{{ $group->id }}"
                                   data-groupid="{{ $group->id }}">
                        @endif
                        </div>
                       
                    </div>

                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-outline-dark"> {{ __('global.Save') }}</button>
                        
                        <button class="btn btn-outline-danger" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i>
                            {{ __('global.Discard') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
