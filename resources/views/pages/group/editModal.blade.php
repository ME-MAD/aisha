<div class="modal fade" id="editGroup" tabindex="-1" role="dialog" aria-labelledby="editGroup" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-title font-weight-bold text-capitalize text-light"
                    id="editGroup">{{ __('group.edite group') }}</h5>
            </div>
            <div class="modal-body">
                <form id="editGroupForm" method="post">
                    @csrf
                    @method('PUT')

                    <x-text name="name" label="إسم المجموعة" id="name"/>
                    
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row mb-4">
                                <label for="teacherId"
                                       class="col-xl-12 col-md-6 col-form-label text-muted font-weight-bold text-capitalize">
                                       {{ __('group.Choose teacher') }}
                                    <i class="fa-solid fa-star-of-life" style="color:rgba(255, 0, 0, 0.779)"></i>
                                </label>
                                <div class="col-xl-12 col-md-6 ">
                                    <select id="teacherId" class="form-control basic" style="width: 100%;" name="teacher_id">
                                        <option value="">{{ __('group.Choose teacher') }}</option>
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
                        </div>
                        <div class="col-4">
                            <div class="form-group row mb-4">
                                <label for="age_type"
                                       class="col-xl-12 col-md-6 col-form-label text-muted font-weight-bold text-capitalize">
                                       {{ __('group.Choose type of group') }}
                                    <i class="fa-solid fa-star-of-life" style="color:rgba(255, 0, 0, 0.779)"></i>
                                </label>
                                <div class="col-xl-12 col-md-6">
                                    <select class="form-control basic" style="width: 100%;" name="group_type_id"
                                            id="groupTypeId">
                                        <option value="">{{ __('group.Choose type of group') }}
                                        </option>
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
                        </div>
                        <div class="col-4">
                            <div class="form-group row mb-4">
                                <label for="age_type"
                                       class="col-xl-12 col-md-6 col-form-label text-muted font-weight-bold text-capitalize">
                                       {{ __('group.age type') }}
                                       <i class="fa-solid fa-star-of-life" style="color:rgba(255, 0, 0, 0.779)"></i>
                                </label>
                                <div class="col-xl-12 col-md-6">
                                    <select class="form-control basic" style="width: 100%;" name="age_type" id="ageType">
                                        <option value="kid">{{ __('group.kid') }}
                                        </option>
                                        <option value="adult">
                                            {{ __('group.adult') }}</option>
                                    </select>
                                    @error('age_type')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-success font-weight-bold text-capitalize">{{ __('global.Update') }}</button>
                        <button class="btn btn-default font-weight-bold text-capitalize" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i>{{ __('global.discard') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
