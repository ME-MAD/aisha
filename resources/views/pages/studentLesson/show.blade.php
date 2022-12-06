@extends('master')

@section('css')
    <link href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/dt-global_style.css') }}">
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>Lesson {{ $studentLesson->lesson->title ?? '' }}</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Daily
                    Analytics</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.home') }}">Home</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.student.show', $studentLesson->student_id) }}">
                    Student {{ $studentLesson->student->name ?? '' }}
                </a>
            </div>
        </div>
    </div>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="bio layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <div class="bio-skill-box">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Subject</h5>
                                                <p>{{ $studentLesson->lesson->subject->name ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Lesson</h5>
                                                <p>{{ $studentLesson->lesson->title ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Student</h5>
                                                <p>{{ $studentLesson->student->name ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Group</h5>
                                                <p>{{ $studentLesson->group->name ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bio layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <h3 class="">Lesson : {{ $studentLesson->lesson->title ?? '' }}</h3>

                            <div class="bio-skill-box">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Chapters Count</h5>
                                                <p>{{ $studentLesson->lesson->chapters_count ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Lesson Starts From</h5>
                                                <p>{{ $studentLesson->lesson->from_page ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Lesson Ends At</h5>
                                                <p>{{ $studentLesson->lesson->to_page ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bio layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <div class="bio-skill-box">
                                <div class="row">
                                    <div class="col-3">
                                        <div
                                            class="d-flex b-skills {{ $studentLesson->finished ? 'bg-success' : 'bg-danger' }}">
                                            <div class="">
                                                <h5 style="color:white">Finished That Lesson</h5>
                                                <p style="color:white">
                                                    {{ $studentLesson->finished ? 'Finished' : 'Not Finished' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Percentage</h5>
                                                <p>{{ $studentLesson->percentage }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Last Chapter Finished</h5>
                                                <p>{{ $studentLesson->last_chapter_finished }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="d-flex b-skills">
                                            <div class="">
                                                <h5>Last Page Finished</h5>
                                                <p>{{ $studentLesson->last_page_finished }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area br-6">
                        <h2 class="alert alert-primary" role="alert">
                            New Lessons
                        </h2>
                        <div class="table-responsive mb-4 mt-4">
                            <div id="html5-extension_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">

                                    <div class="col-md-12">
                                        <table id="html5-extension"
                                            class="table table-hover non-hover dataTable no-footer" style="width: 100%;"
                                            role="grid" aria-describedby="html5-extension_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="html5-extension"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 197px;">From Chapter</th>
                                                    <th class="sorting" tabindex="0" aria-controls="html5-extension"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 85px;">To Chapter</th>
                                                    <th class="sorting" tabindex="0" aria-controls="html5-extension"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 32px;">From Page</th>
                                                    <th class="sorting" tabindex="0" aria-controls="html5-extension"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 95px;">To Page</th>
                                                    <th class="sorting" tabindex="0" aria-controls="html5-extension"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 61px;">Finished</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($studentLesson->syllabus as $syllab)
                                                    <tr role="row">
                                                        <td>{{ $syllab->from_chapter }}</td>
                                                        <td>{{ $syllab->to_chapter }}</td>
                                                        <td>{{ $syllab->from_page }}</td>
                                                        <td>{{ $syllab->to_page }}</td>
                                                        @if ($syllab->finished == 1)
                                                            <td><span class="badge badge-success"> Completed
                                                                </span></td>
                                                        @else
                                                            <td><span class="badge badge-danger">Not Completed </span></td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{ asset('adminAssets/plugins/table/datatable/datatables.js') }}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{ asset('adminAssets/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
    <script>
        $('#html5-extension').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'copy',
                        className: 'btn'
                    },
                    {
                        extend: 'csv',
                        className: 'btn'
                    },
                    {
                        extend: 'excel',
                        className: 'btn'
                    },
                    {
                        extend: 'print',
                        className: 'btn'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endsection
