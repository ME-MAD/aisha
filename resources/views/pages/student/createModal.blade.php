<div class="modal fade" id="creatStudentModal" tabindex="-1" role="dialog" aria-labelledby="creatStudentModal"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-title font-weight-bold text-capitalize text-light" id="creatStudentModal">إضافة طالب</h5>
            </div>
            <div class="modal-body ">
                <form action="{{ route('admin.student.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <x-text name="name"
                            :required="true"
                            label="{{trans('student.name')}}"
                            placeholder="{{trans('student.name')}}"
                            :value="old('name')"/>
                        </div>
                        <div class="col-6">
                            <x-text name="email"
                            :required="true"
                            label="{{trans('student.email')}}"
                            placeholder="{{trans('student.email')}}"
                            :value="old('email')"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-text name="password"
                            :required="true"
                            label="{{trans('student.password')}}"
                            placeholder="{{trans('student.password')}}"
                            :value="old('password')"/>
                        </div>
                        <div class="col-6">
                            <x-text name="password_confirmation"
                            :required="true"
                            label="{{trans('student.confirm password')}}"
                            placeholder="{{trans('student.confirm password')}}" />
                        </div>
                    </div>
                   
                    <div class="form-group my-2">
                        <label
                            class="font-weight-bold text-capitalize text-muted"> {{__('student.choose role')}} </label>
                            <i class="fa-solid fa-star-of-life required-star"></i>
                        <select class="form-control my-2" style="width: 100%;"
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

                    <div class="row">
                        <div class="col-4">
                            <x-date name="birthday"
                            label="{{__('student.birthday')}}"
                            placeholder="{{__('student.birthday')}}"
                            :value="old('birthday')"/>
                        </div>
                        <div class="col-4">
                            <x-text name="phone"
                            :required="true"
                            label="{{__('student.phone')}}"
                            placeholder="{{__('student.phone')}}"
                            :value="old('phone')"/>
                        </div>
                        <div class="col-4">
                            <x-text name="qualification"
                            label="{{__('student.qualification')}}"
                            placeholder="{{__('student.qualification')}}"
                            :value="old('qualification')"/>
                        </div>
                    </div>

                    <div class="custom-file-container" data-upload-id="myFirstImage">
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
                        <button type="submit"
                                class="btn btn-outline-dark">
                            {{ __('global.Save') }}
                        </button>

                        <button class="btn btn-outline-danger" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i>{{ __('global.Discard') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
