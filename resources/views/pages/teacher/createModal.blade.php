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
                            <x-text name="name" placeholder="أدخل أسم المعلم" label="{{ __('teacher.name') }}" :value="old('name')" />
                        </div>
                        <div class="col-6">
                            <x-text name="email" placeholder="أدخل بريد الإلكتروني بالمعلم" label="Email" :value="old('email')" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-text name="password" placeholder="أدخل كلمة المرور"  label="Password" :value="old('password')" />
                        </div>
                        <div class="col-6">
                            <x-text name="password_confirmation" placeholder="تأكيد كلمة المرور 
                    </div>

                    <div class="form-group">
                        <label for="role" class="text-capitalize font-weight-bold text-muted">
                            {{trans('user.role')}}
                            <i class="fa-solid fa-star-of-life" style="color:red"></i>
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
                            <x-text name="phone" placeholder="أدخل هاتف المعلم" label="{{ __('teacher.phone') }}" :value="old('phone')" />
                        </div>
                        <div class="col-4">
                            <x-text name="qualification" placeholder="أدخل مؤهل المعلم" label="{{ __('teacher.qualification') }}" :value="old('qualification')" />
                        </div>
                    </div>

                    <div class="custom-file-container" data-upload-id="myFirstImage">
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
                        <button type="submit" class="btn btn-dark">{{ __('teacher.Save') }}</button>
                        <button class="btn" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i>{{ __('teacher.Discard') }}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
