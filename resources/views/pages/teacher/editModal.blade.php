<div class="modal fade" id="editTeacher" tabindex="-1" role="dialog" aria-labelledby="editTeacher" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-title font-weight-bold text-capitalize text-light"  id="editTeacher">{{ __('teacher.edite teacher') }}</h5>
            </div>
            <div class="modal-body">
                <form id="editTeacherForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-6">
                           <x-text name="name" :required="true" label="{{ __('teacher.name') }}" id="name" />
                        </div>
                        <div class="col-6">
                           <x-text name="email" :required="true" label="Email" :value="old('email')" id="email" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                          <x-text name="password"  label="Password" :value="old('password')" />
                        </div>
                        <div class="col-6">
                          <x-text name="password_confirmation"  label="Confirm Password" />
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
                            <x-date name="birthday" :required="true" label="{{ __('teacher.birthday') }}" id="birthday" />
                        </div>
                        <div class="col-4">
                           <x-text name="phone" :required="true" label="{{ __('teacher.phone') }}" id="phone" />
                        </div>
                        <div class="col-4">
                          <x-text name="qualification" :required="true" label="{{ __('teacher.qualification') }}" id="qualification" />
                        </div>
                    </div>

                    <div class="custom-file-container" data-upload-id="mySecondImage">
                        <label>{{ __('teacher.avatar') }}<a href="javascript:void(0)"
                                class="custom-file-container__image-clear" title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                accept="image/*" name="avatar">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control">
                                {{-- here is center  html js but not work --}}
                            </span>
                        </label>
                        <div class="custom-file-container__image-preview">
                            {{-- here is center tag img but not work --}}
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __('teacher.Update') }}</button>
                        <button class="btn" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i>{{ __('teacher.Discard') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
