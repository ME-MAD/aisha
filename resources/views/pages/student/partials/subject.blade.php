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
        <div class="row" style="height: 400px">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    @foreach ($subjects as $subject)
                        <a class="list-group-item list-group-item-action" id="listhome" data-toggle="listhome"
                            href="#list-home{{ $subject->id }}" role="tab"
                            aria-controls="home">{{ $subject->name }}</a>
                    @endforeach


                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="list-home-list">
                        <ul class="list-group task-list-group" id="list" style="display: none;">
                            @foreach ($lessons as $lesson)
                                <li class="list-group-item list-group-item-action">
                                    <div class="n-chk" id="list-home{{ $lesson->subject_id }}">
                                        <label
                                            class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                                            <input type="checkbox" class="new-control-input">
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
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <h1>hello this is Two</h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@section('javascript')
    <script>
        $(document).ready(function() {

            $('#listhome').click(function() {
                $('#list').show();
            });

        })
    </script>
@endsection
