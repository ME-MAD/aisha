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
    @foreach ($student->groupStudents as $groupStudent)
        <div>
            <p> <span class="badge bg-primary text-light">From</span>
                {{ $groupStudent->group->from }} :<span class="badge bg-primary text-light">To</span>
                {{ $groupStudent->group->to }}
                @foreach ($groupStudent->group->groupDays as $groupDay)
                    <span class="badge bg-info text-light">{{ $groupDay->day }}</span>
                @endforeach
            </p>

            <div class="row p-4">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        @foreach ($subjects as $subject)
                            <a class="list-group-item list-group-item-action"
                                id="list-home-list{{ $groupStudent->id }}{{ $subject->id }}" data-toggle="list"
                                href="#list-home{{ $groupStudent->id }}{{ $subject->id }}" role="tab"
                                aria-controls="home">{{ $subject->name }}</a>
                        @endforeach
                    </div>
                </div>

                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        @foreach ($subjects as $subject)
                            <div class="tab-pane fade show" id="list-home{{ $groupStudent->id }}{{ $subject->id }}"
                                role="tabpanel"
                                aria-labelledby="list-home-list{{ $groupStudent->id }}{{ $subject->id }}">
                                <ul class="list-group task-list-group" style="height: 400px;overflow:auto">
                                    @foreach ($subject->lessons as $lesson)
                                        <li class="list-group-item list-group-item-action">
                                            {{-- {{dd($lesson->load(['studentLessons' => function($q) use($groupStudent,$student){
                                                $q->where('group_id',$groupStudent->group_id)->where('student_id', $student->id);
                                            }]))}} --}}

                                            <div class="n-chk">
                                                <label
                                                    class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                                                    @if (($groupStudent->group->studentLessons->where('lesson_id', $lesson->id)->first()->finished ?? false) == true)
                                                        <input type="checkbox" class="new-control-input"
                                                            data-href="{{ route('admin.student_lesson.ajaxStudentLessonFinished') }}"
                                                            data-groupid="{{ $groupStudent->group->id }}"
                                                            data-lessonid="{{ $lesson->id }}"
                                                            data-studentid="{{ $student->id }}" checked>
                                                    @else
                                                        <input type="checkbox" class="new-control-input"
                                                            data-href="{{ route('admin.student_lesson.ajaxStudentLessonFinished') }}"
                                                            data-groupid="{{ $groupStudent->group->id }}"
                                                            data-lessonid="{{ $lesson->id }}"
                                                            data-studentid="{{ $student->id }}"
                                                            data-chaptercount="{{ $lesson->chapters_count }}">
                                                    @endif

                                                    <span class="new-control-indicator"></span>
                                                    <span class="ml-2">
                                                        {{ $lesson->title }}
                                                    </span>
                                                    <span class="ml-3 d-block">
                                                        <span class="badge badge-secondary">Project</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <br>


                                            <a class="createSubjectButton subject" data-toggle="modal"
                                                data-target="#createSubjectModal"
                                                data-chapterscount="{{ $lesson->chapters_count }}"
                                                data-finishedchapterscount="{{ $groupStudent->group->studentLessons->where('lesson_id', $lesson->id)->first()->chapters_count ?? 0 }}"
                                                data-groupid="{{ $groupStudent->group->id }}"
                                                data-lessonid="{{ $lesson->id }}"
                                                data-studentid="{{ $student->id }}">
                                                <div class="progress br-30">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width:{{ $groupStudent->group->studentLessons->where('lesson_id', $lesson->id)->first()->percentage ?? 0 }}%"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-title"><span>
                                                                {{ $lesson->title }}</span>
                                                            <span class="progress-bar-percentage">
                                                                {{ $groupStudent->group->studentLessons->where('lesson_id', $lesson->id)->first()->percentage ?? 0 }}%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </a>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="modal fade" id="createSubjectModal" tabindex="-1" role="dialog" aria-labelledby="createSubjectModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSubjectModal">إضافة مؤهل</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.student_lesson.store') }}" method="post" id="showSubjectForm">
                    @csrf
                    <input type="hidden" name="group_id" id="group_id">
                    <input type="hidden" name="lesson_id" id="lesson_id">
                    <input type="hidden" name="student_id" value="{{ $student->id }}">

                    <div class="row">
                        <div class="col">

                            <input class="text-dark form-control" id="max_chapters" readonly name="max_chapters">
                        </div>
                        <div class="col">
                            <input id="chapters_count" class="form-control" type="number" name="chapters_count" min=""
                                max="">
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
