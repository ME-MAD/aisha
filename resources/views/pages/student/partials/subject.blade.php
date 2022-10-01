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
    @foreach ($groupStudents as $groupStudent)
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
                            <a class="list-group-item list-group-item-action" id="list-home-list{{ $groupStudent->id }}"
                                data-toggle="list" href="#list-home{{ $groupStudent->id }}" role="tab"
                                aria-controls="home">{{ $subject->name }}</a>
                        @endforeach
                    </div>
                </div>

                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        @foreach ($subjects as $subject)
                            <div class="tab-pane fade show" id="list-home{{ $groupStudent->id }}" role="tabpanel"
                                aria-labelledby="list-home-list{{ $groupStudent->id }}">
                                <ul class="list-group task-list-group" style="height: 400px;overflow:auto">
                                    @foreach ($subject->lessons as $lesson)
                                        <li class="list-group-item list-group-item-action">
                                            <div class="n-chk">
                                                <label
                                                    class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                                                    @foreach ($studentLessons as $studentLesson)
                                                        <input type="checkbox" class="new-control-input"
                                                            data-href="{{ route('admin.student_lesson.ajax') }}"
                                                            data-groupid="{{ $groupStudent->group->id }}"
                                                            data-lessonid="{{ $lesson->id }}"
                                                            data-studentid="{{ $student->id }}"
                                                            {{ $studentLesson->finished == 1 ? 'checked' : '' }}>
                                                    @endforeach

                                                    <span class="new-control-indicator"></span>
                                                    <span class="ml-2">
                                                        {{ $lesson->title }}
                                                    </span>
                                                    <span class="ml-3 d-block">
                                                        <span class="badge badge-secondary">Project</span>
                                                    </span>
                                                </label>
                                            </div>
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