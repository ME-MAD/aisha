<div class="modal fade" id="creatTeacherModal" tabindex="-1" role="dialog" aria-labelledby="creatTeacherModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-primary">
                <h5 class="modal-title text-white" id="creatTeacherModal">{{ __('teacher.create teacher') }}</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.teacher.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <x-text name="name" label="{{ __('teacher.name') }}" :value="old('name')" />

                    <x-date name="birthday" label="{{ __('teacher.birthday') }}" :value="old('birthday')" />

                    <x-text name="phone" label="{{ __('teacher.phone') }}" :value="old('phone')" />

                    <x-text name="qualification" label="{{ __('teacher.qualification') }}" :value="old('qualification')" />

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
