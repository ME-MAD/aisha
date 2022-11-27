<div class="widget-content-area" id="groupStudentsContainer" data-href="{{route('admin.student.getGroupStudents', $student)}}">
    <h3 class="">Student syllabus</h3>
    {{-- @foreach ($student->groupStudents as $groupStudent)
        <div>
            <p class="text-center"> <span class="badge bg-primary text-light">From</span>
                {{ $groupStudent->group->from }} :<span class="badge bg-primary text-light">To</span>
                {{ $groupStudent->group->to }}
                @foreach ($groupStudent->group->groupDays as $groupDay)
                    <span class="badge bg-info text-light">{{ $groupDay->day }}</span>
                @endforeach
            </p>

            <div class="row">
                @foreach ($subjects as $subject)
                    <div class="col-4 mb-4">
                        <div class="card component-card_1">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <a class="subjectShowButton text-dark"
                                        data-opensubjecthref="{{ route('admin.subject.getSubjectBook', $subject) }}"
                                        data-subject="{{ $subject }}"
                                        id="list-home-list{{ $groupStudent->id }}{{ $subject->id }}"
                                        href="#list-home{{ $groupStudent->id }}{{ $subject->id }}">
                                        {{ $subject->name }}
                                    </a>
                                </h5>
                                <img src="{{ $subject->avatar }}" alt=""
                                    class="avatar-image rounded mx-auto d-block">
                                <div class="btn btn-primary rounded mx-auto d-block mt-2">
                                    Lessson Count <span
                                        class="badge badge-light">{{ $subject->lessons->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach --}}
</div>
