@foreach ($subjects as $subject)
<div class="tab-pane fade show" id="list-home{{ $groupStudent->id }}{{ $subject->id }}"
    role="tabpanel"
    aria-labelledby="list-home-list{{ $groupStudent->id }}{{ $subject->id }}">
    <ul class="list-group task-list-group" style="height: 400px;overflow:auto">
        @foreach ($subject->lessons as $lesson)
            <li class="list-group-item list-group-item-action">

                <div class="text-center mb-3">
                    <label class="float-left">
                        @if ($groupStudent->checkIfLessonIsFinished($lesson->id))
                            <input type="checkbox" class="lesson_finished_checkbox big-checkbox"
                                data-href="{{ route('admin.student_lesson.ajaxStudentLessonFinished') }}"
                                data-groupid="{{ $groupStudent->group->id }}"
                                data-lessonid="{{ $lesson->id }}"
                                data-studentid="{{ $student->id }}" checked>
                        @else
                            <input type="checkbox" class="lesson_finished_checkbox big-checkbox"
                                data-href="{{ route('admin.student_lesson.ajaxStudentLessonFinished') }}"
                                data-groupid="{{ $groupStudent->group->id }}"
                                data-lessonid="{{ $lesson->id }}"
                                data-studentid="{{ $student->id }}"
                                data-chaptercount="{{ $lesson->chapters_count }}">
                        @endif
                    </label>

                    <span>
                        <a 
                            class="text-primary" 
                        
                            data-lesson="{{$lesson}}"
                        >
                            {{ $lesson->title }}
                        </a>
                    </span>

                </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span
                            class="badge badge-success">{{ $groupStudent->getStudentLessonChaptersCount($lesson->id) }}
                        </span>
                        <span class="badge badge-secondary">
                            {{ $lesson->chapters_count }}
                        </span>
                    </div>

                    <a class="progressOfSubjectLink subject" data-toggle="modal" data-target="#createSubjectModal"
                        data-chapterscount="{{ $lesson->chapters_count }}"
                        data-finishedchapterscount="{{ $groupStudent->getStudentLessonChaptersCount($lesson->id) }}"
                        data-groupid="{{ $groupStudent->group->id }}" data-lessonid="{{ $lesson->id }}"
                        data-studentid="{{ $student->id }}">
                        <div class="progress br-30">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width:{{ $groupStudent->getStudentLessonPercentage($lesson->id) }}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-title"><span>
                                        {{ $lesson->title }}</span>
                                    <span class="progress-bar-percentage">
                                        {{ $groupStudent->getStudentLessonPercentage($lesson->id) }}%
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
                            <input id="chapters_count" class="form-control" type="number" name="chapters_count"
                                min="" max="">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
