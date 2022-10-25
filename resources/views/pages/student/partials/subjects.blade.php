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
                            <a class="list-group-item list-group-item-action subjectShowButton"
                                data-opensubjecthref="{{route('admin.subject.getSubjectBook',$subject)}}"
                                data-subject="{{$subject}}"
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