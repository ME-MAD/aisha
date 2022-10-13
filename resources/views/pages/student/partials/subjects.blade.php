<div class="work-experience widget-content-area">
    <h3 class="">Student syllabus

    </h3>
    @foreach ($student->groupStudents as $groupStudent)
        <div>
            <p class="text-center"> <span class="badge bg-primary text-light">From</span>
                {{ $groupStudent->group->from }} :<span class="badge bg-primary text-light">To</span>
                {{ $groupStudent->group->to }}
                @foreach ($groupStudent->group->groupDays as $groupDay)
                    <span class="badge bg-info text-light">{{ $groupDay->day }}</span>
                @endforeach
            </p>

            <div class="row p-4">
                <div class="col-3">
                    <div class="list-group" id="list-tab" role="tablist">
                        @foreach ($subjects as $subject)
                            <a class="list-group-item list-group-item-action"
                                id="list-home-list{{ $groupStudent->id }}{{ $subject->id }}" data-toggle="list"
                                href="#list-home{{ $groupStudent->id }}{{ $subject->id }}" role="tab"
                                aria-controls="home">{{ $subject->name }}</a>
                        @endforeach
                    </div>
                </div>

                <div class="col-9">
                    <div class="tab-content" id="nav-tabContent">
                        @include('pages.student.partials.subject')
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
                            <input id="chapters_count" class="form-control" type="number" name="chapters_count"
                                min="" max="">
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
