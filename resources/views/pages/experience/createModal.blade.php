<div class="modal fade" id="creatExperienceModal" tabindex="-1" role="dialog" aria-labelledby="creatExperienceModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-primary text-capitalize font-weight-bold">
                <h5 class="modal-title text-white" id="creatExperienceModal">إضافة خبرة مدرس</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.experience.store') }}" method="post">
                    @csrf

                    <x-text name="title" label="العنوان" :value="old('title')"/>

                    <x-date name="from" id="from" label="من" :value="old('from')"/>

                    <x-date name="to" id="to" label="الى" :value="old('to')"/>

                    @if (!isset($teacher))
                        <div class="form-group row mb-4">
                            <label for="age_type"
                                   class="col-xl-12 col-md-6  col-form-label text-muted font-weight-bold text-capitalize">
                                اختر
                                المعلم</label>
                            <div class="col-xl-12 col-md-6 ">
                                <select class="form-control basic" style="width: 100%;" name="teacher_id"
                                        id="teacher_id">
                                    <option value="">اختر المعلم</option>
                                    @foreach ($teachers as $item)
                                        <option value="{{ $item->id }}"
                                                {{ old('teacher_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
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
                                class="btn btn-primary font-weight-bold text-capitalize">
                            {{ __('globalWorld.Save') }}
                        </button>

                        <button class="btn btn-light-default font-weight-bold text-capitalize" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i>{{ __('globalWorld.Discard') }}
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
