<div class="work-experience widget-content-area">
    <h3 class="">Student syllabus
        <a class="text-success float-right" type="button" data-toggle="modal" data-target="#createSyllabusModal">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="16"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
        </a>
    </h3>
    <div class="table-responsive">
        {{-- <table class="table table-hover table-dark mb-4">
            <thead>
                <tr class="">
                    <th class="text-center">#</th>
                    <th>New Lesson</th>
                    <th>Old Lesson</th>
                    <th>Is reverse</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($syllabus as $syllabu)
                    <tr>
                        <td class="text-center">{{ $syllabu->id }}</td>
                        <td>{{ $syllabu->lesson_new->title }}</td>
                        <td>{{ $syllabu->lesson_old->title }}</td>
                        <td>{{ $syllabu->is_reverse }}</td>

                        <td class="text-center">
                            <div class="links--ul text-center">
                                <a data-lessonnew="{{ $syllabu->new_lesson }}"
                                    data-lessonold="{{ $syllabu->old_lesson }}"
                                    data-isreverse="{{ $syllabu->is_reverse }}" data-syllabusid="{{ $syllabu->id }}"
                                    data-href="{{ route('admin.syllabus.update', $syllabu->id) }}"
                                    class="editSyllabusButton bs-tooltip text-success m-auto" style="font-size: 1.3rem"
                                    data-target="#editSyllabus" data-toggle="modal" data-placement="top" title=""
                                    data-original-title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                            </div>
                        </td>
                        <td class="text-center">
                            <div class="links--ul text-center">
                                <x-delete-link :route="route('admin.syllabus.delete', $syllabu->id)" />
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div>
</div>





<!--  modal tamplet Creat -->

<div class="modal fade" id="createSyllabusModal" tabindex="-1" role="dialog" aria-labelledby="createSyllabusModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSyllabusModal">إضافة منهج دراسي</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.syllabus.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="student_id" value="{{ $student->id }}">


                    <div class="form-group row mb-4">
                        <label for="new_lesson" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary"> الدرس
                            الجديد</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="new_lesson" id="new_lesson">
                                <option value="">اختر الدرس</option>
                                @foreach ($lessons as $lesson)
                                    <option value="{{ $lesson->id }}"
                                        {{ old('new_lesson') == $lesson->id ? 'selected' : '' }}>
                                        {{ $lesson->title }}</option>
                                @endforeach
                            </select>
                            @error('new_lesson')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="old_lesson" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary"> الدرس
                            القديم</label>

                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="old_lesson" id="old_lesson">
                                <option value="">اختر الدرس</option>
                                @foreach ($lessons as $lesson)
                                    <option value="{{ $lesson->id }}"
                                        {{ old('old_lesson') == $lesson->id ? 'selected' : '' }}>
                                        {{ $lesson->title }}</option>
                                @endforeach
                            </select>
                            @error('old_lesson')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label for="is_reverse" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">Is
                            Revers</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="is_reverse" id="is_reverse">
                                <option value="0"{{ old('is_reverse') == '0' ? '0' : '' }}>NO</option>
                                <option value="1" {{ old('is_reverse') == '1' ? '1' : '' }}>YES</option>
                            </select>
                            @error('is_reverse')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button class="btn" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i>Discard</button>
                    </div>



                </form>


            </div>
        </div>
    </div>
</div>


<!--  modal tamplet Edit -->

<div class="modal fade" id="editSyllabus" tabindex="-1" role="dialog" aria-labelledby="editSyllabus"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSyllabus">تعديل العنوان</h5>
            </div>
            <div class="modal-body">
                <form id="editSyllabusForm" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="student_id" value="{{ $student->id }}">


                    <div class="form-group row mb-4">
                        <label for="new_lesson" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary"> الدرس
                            الجديد</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="new_lesson"
                                id="new_lesson">
                                @foreach ($lessons as $lesson)
                                    <option value="{{ $lesson->id }}">
                                        {{ $lesson->title }}</option>
                                @endforeach
                            </select>
                            @error('new_lesson')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="old_lesson" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary"> الدرس
                            القديم</label>

                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="old_lesson"
                                id="old_lesson">
                                @foreach ($lessons as $lesson)
                                    <option value="{{ $lesson->id }}">
                                        {{ $lesson->title }}</option>
                                @endforeach
                            </select>
                            @error('old_lesson')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label for="is_reverse" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">Is
                            Revers</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="is_reverse"
                                id="is_reverse">
                                <option value="0" >NO</option>
                                <option value="1" >YES</option>
                            </select>
                            @error('is_reverse')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>













                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button class="btn" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i>Discard</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
