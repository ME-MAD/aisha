<div class="modal fade" id="editLesson" tabindex="-1" role="dialog" aria-labelledby="editLesson" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark font-weight-bold text-capitalize">
                <h5 class="modal-title text-white" id="editLesson">تعديل الدرس</h5>
            </div>
            <div class="modal-body">
                <form id="editLessonForm" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group row mb-4">
                        <label for="age_type"
                               class="col-xl-12 col-md-6 col-form-label text-dark font-weight-bold text-capitalize">
                            اختر
                            المادة</label>
                        <div class="col-xl-12 col-md-6">
                            <select class="form-control basic" style="width: 100%;" name="subject_id" id="subject_id">
                                <option value="">اختر المادة</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <x-text name="title" label="عنوان الدرس" id="title"/>

                    <div class="form-group row mb-4">
                        <label for="name"
                               class="col-xl-12 col-md-6 col-form-label text-dark font-weight-bold text-capitalize">بداية
                            الصفحة</label>
                        <div class="col-xl-12 col-md-6">
                            <input type="number" class="form-control" placeholder="" name="from_page" id="from_page"
                                   min="0" max="">
                            @error('from_page')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="name"
                               class="col-xl-12 col-md-6 col-form-label text-dark font-weight-bold text-capitalize">نهاية
                            الصفحة</label>
                        <div class="col-xl-12 col-md-6">
                            <input type="number" class="form-control" placeholder="" name="to_page" id="to_page"
                                   min="0" max="">
                            @error('to_page')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="name"
                               class="col-xl-12 col-md-6 col-form-label text-dark font-weight-bold text-capitalize">عدد
                            الايات</label>
                        <div class="col-xl-12 col-md-6">
                            <input type="number" class="form-control" placeholder="" name="chapters_count"
                                   id="chapters_count" min="0" max="">
                            @error('chapters_count')
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
