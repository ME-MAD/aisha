<div class="modal fade" id="addStudentLessonModal" tabindex="-1" role="dialog" aria-labelledby="addStudentLessonModal"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header create__form__header">
                <h5 class="modal-title font-weight-bold text-capitalize text-light" id="addStudentLessonModalTitle">{{ __('teacher.create teacher') }}</h5>
            </div>
            <div class="modal-body">
                <form id="addStudentLessonModalForm" method="post" data-href="{{ route('admin.syllabus.createNewLesson') }}">
                    @csrf

                    <div class="row mb-5">
                        <div class="col-6">
                            <p>
                                الدرس يبدا من صفحة 
                                <span class="badge bg-primary" id="lesson_from_page">0</span>
                                وينتهي عند 
                                <span class="badge bg-primary" id="lesson_to_page">0</span>
                            </p>
                        </div>
                        <div class="col-6">
                            <p>
                                عدد أجزاء الدرس
                                <span class="badge bg-primary" id="lesson_chapters_count">0</span>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject_id" class="text-capitalize font-weight-bold text-muted">
                            {{trans('user.subject_id')}}
                            <i class="fa-solid fa-star-of-life required-star"></i>
                        </label>
                        <select class="form-control basic subject_create"
                                name="subject_id"
                                id="subject_id" data-select2-id="subject_create">
                            <option value="">{{trans('user.lessons')}}</option>

                        </select>
                        @error('lesson')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="lesson_id" class="text-capitalize font-weight-bold text-muted">
                            {{trans('user.lesson_id')}}
                            <i class="fa-solid fa-star-of-life required-star"></i>
                        </label>
                        <select class="form-control basic lesson_create"
                                name="lesson_id"
                                id="lesson_id" data-select2-id="lesson_create">
                            <option value="">{{trans('user.lessons')}}</option>

                        </select>
                        @error('lesson')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    

                    <div class="row">
                        <div class="col-6">
                            <x-number name="from_chapter" :required="true" placeholder="أدخل أسم المعلم" label="from chapter" :value="old('from_chapter')"/>
                        </div>
                        <div class="col-6">
                            <x-number name="to_chapter" :required="true" placeholder="أدخل أسم المعلم" label="to chapter" :value="old('to_chapter')"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-number name="from_page" :required="true" placeholder="أدخل أسم المعلم" label="from page" :value="old('from_page')"/>
                        </div>
                        <div class="col-6">
                            <x-number name="to_page" :required="true" placeholder="أدخل أسم المعلم" label="to page" :value="old('to_page')"/>
                        </div>
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