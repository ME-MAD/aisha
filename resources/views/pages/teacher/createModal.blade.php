<div class="modal fade" id="creatTeacherModal" tabindex="-1" role="dialog" aria-labelledby="creatTeacherModal"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-title font-weight-bold text-capitalize text-light" id="creatTeacherModal">{{ __('teacher.create teacher') }}</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.teacher.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <x-text name="name" :required="true" placeholder="أدخل أسم المعلم" label="{{ __('teacher.name') }}" :value="old('name')" :required="true" />
                        </div>
                        <div class="col-6">
                            <x-text name="email" :required="true" placeholder="أدخل بريد الإلكتروني بالمعلم" label="Email" :value="old('email')" :required="true" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-text name="password" :required="true" placeholder="أدخل كلمة المرور"  label="Password" :value="old('password')" :required="true" />
                        </div>
                        <div class="col-6">
                            <x-text name="password_confirmation" :required="true" label="Confirm Password" placeholder="تأكيد كلمة المرور" :required="true" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role" class="text-capitalize font-weight-bold text-muted">
                            {{trans('user.role')}}
                            <i class="fa-solid fa-star-of-life required-star"></i>
                        </label>
                        <select class="form-control basic"
                                name="role"
                                id="role">
                            <option >{{trans('user.roles')}}</option>

                            @foreach ($roles as $role)

                                <option  class="active" value="{{$role->name}}">{{$role->name}}</option>

                            @endforeach
                        </select>
                        @error('role')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <x-date name="birthday" label="{{ __('teacher.birthday') }}" :value="old('birthday')" />
                        </div>
                        <div class="col-4">
                            <x-text name="phone" :required="true" placeholder="أدخل هاتف المعلم" label="{{ __('teacher.phone') }}" :value="old('phone')" />
                        </div>
                        <div class="col-4">
                            <x-text name="qualification" :required="true"  placeholder="أدخل مؤهل المعلم" label="{{ __('teacher.qualification') }}" :value="old('qualification')" />
                        </div>
                    </div>

                    <div class="custom-file-container" data-upload-id="image_create">
                        <label>{{ __('teacher.avatar') }}
                            <a href="javascript:void(0)"
                                class="custom-file-container__image-clear"
                               title="Clear Image">

                            </a>
                        </label>
                        <label class="custom-file-container__custom-file">

                            <input type="file"
                                   class="custom-file-container__custom-file__custom-file-input"
                                accept="image/*"
                                   name="avatar">

                            <input type="hidden"
                                   name="MAX_FILE_SIZE"
                                   value="10485760" />

                            <span class="custom-file-container__custom-file__custom-file-control"></span>

                        </label>

                        <div class="custom-file-container__image-preview"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-dark">{{ __('teacher.Save') }}</button>
                        <button class="btn btn-outline-danger" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i>{{ __('teacher.Discard') }}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
