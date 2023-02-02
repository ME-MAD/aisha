<div class="modal fade" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="editStudent" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-success  ">
                <h5 class="modal-title text-white font-weight-bold" id="editStudent">
                    {{trans('student.update student')}}
                </h5>
            </div>
            <div class="modal-body">
                <form id="editStudentForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <x-text name="name"
                            label="{{trans('student.name')}}"
                            placeholder="{{trans('student.name')}}"
                            :value="old('name')"/>

                    <x-text name="email"
                            label="{{trans('student.email')}}"
                            placeholder="{{trans('student.email')}}"
                            :value="old('email')"/>

                    <x-text name="password"
                            label="{{trans('student.password')}}"
                            placeholder="{{trans('student.password')}}"
                            :value="old('password')"/>

                    <x-text name="password_confirmation"
                            label="{{trans('student.confirm password')}}"
                            placeholder="{{trans('student.confirm password')}}"/>

                    <div class="form-group my-2">
                        <label
                            class="font-weight-bold text-capitalize text-muted"> {{__('student.choose role')}} </label>

                        <select class="form-control selectpicker my-2" style="width: 100%;"
                                name="role"
                                id="role">
                            <option value="">{{__('student.choose role')}}</option>
                            @forelse($roles as $role)
                                <option value="{{$role->name}}">
                                    {{$role->name}}
                                </option>
                            @empty
                                <option value="">
                                    No Roles Founded
                                </option>
                            @endforelse
                        </select>
                        @error('role')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-date name="birthday"
                            label="{{__('student.birthday')}}"
                            placeholder="{{__('student.birthday')}}"
                            :value="old('birthday')"/>

                    <x-text name="phone"
                            label="{{__('student.phone')}}"
                            placeholder="{{__('student.phone')}}"
                            :value="old('phone')"/>

                    <x-text name="qualification"
                            label="{{__('student.qualification')}}"
                            placeholder="{{__('student.qualification')}}"
                            :value="old('qualification')"/>

                    <div class="custom-file-container" data-upload-id="mySecondImage">
                        <label>
                            {{trans('student.choose photo')}}
                            <a href="javascript:void(0)"
                               class="custom-file-container__image-clear"
                               title="Clear Image">
                            </a>
                        </label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                   accept="image/*" name="avatar">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success text-capitalize font-weight-bold">
                            {{__('student.update')}}
                        </button>

                        <button class="btn btn-light-default text-capitalize font-weight-bold"
                                data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i>
                            {{__('student.discard')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
