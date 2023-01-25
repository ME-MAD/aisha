<div class="modal fade" id="editexperience" tabindex="-1" role="dialog" aria-labelledby="editexperience"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-warning text-dark">
                <h5 class="modal-title text-white" id="editexperience">تعديل بيانات المعلم</h5>
            </div>
            <div class="modal-body">
                <form id="editExperienceForm" method="post">
                    @csrf
                    @method('PUT')

                    <x-text name="title" label="العنوان" id="title"/>

                    <x-date name="from" label="من" id="from"/>

                    <x-date name="to" label="الى" id="to"/>

                    @if (!isset($teacher))
                        <div class="form-group row mb-4">
                            <label for="age_type"
                                   class="col-xl-12 col-md-6  col-form-label text-muted font-weight-bold text-capitalize">
                                اختر
                                المعلم</label>
                            <div class="col-xl-12 col-md-6 ">
                                <select id="teacherId" class="form-control basic" style="width: 100%;" name="teacher_id"
                                        id="teacher_id">
                                    <option value="">اختر المعلم</option>
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
                    @else
                        <input type="hidden" name="teacher_id" id="teacherId" value="{{ $teacher->id }}">
                    @endif
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
