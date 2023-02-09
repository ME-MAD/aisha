<div class="modal fade" id="editGroup" tabindex="-1" role="dialog" aria-labelledby="editGroup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-dark  ">
                <h5 class="modal-title text-white text-capitalize font-weight-bold"
                    id="editGroup">{{ __('group.edite group') }}</h5>
            </div>
            <div class="modal-body">
                <form id="editGroupForm" method="post">
                    @csrf
                    @method('PUT')

                    <x-text name="name" label="{{ __('group.name') }}" id="name"/>
                    
                    <div class="form-group row mb-4">
                        <label for="teacherId"
                               class="col-xl-12 col-md-6 col-form-label text-muted font-weight-bold text-capitalize">{{ __('group.Choose teacher') }}
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
                    <div class="form-group row mb-4">
                        <label for="age_type"
                               class="col-xl-12 col-md-6 col-form-label text-muted font-weight-bold text-capitalize">{{ __('group.Choose type of group') }}
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
                    <div class="form-group row mb-4">
                        <label for="age_type"
                               class="col-xl-12 col-md-6 col-form-label text-muted font-weight-bold text-capitalize">{{ __('group.age type') }}
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
