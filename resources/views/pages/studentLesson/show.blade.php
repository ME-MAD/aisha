@extends('master')


@push('css')

    @if(LaravelLocalization::getCurrentLocale() == 'ar')
        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/plugins/table/datatable/datatables.css') }}">

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/plugins/table/datatable/dt-global_style.css') }}">

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/assets/css/users/user-profile.css') }}"/>

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/assets/css/scrollspyNav.css') }}"/>

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/assets/css/components/timeline/custom-timeline.css') }}"/>
    @else

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/plugins/table/datatable/dt-global_style.css') }}">

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}"/>

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/assets/css/scrollspyNav.css') }}"/>

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/assets/css/components/timeline/custom-timeline.css') }}"/>
    @endif

@endpush

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
                </svg>
            </a>

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
                        @include('pages.studentLesson.partials.sectionOne')
                    </div>
                    <div class="bio layout-spacing ">
                        @include('pages.studentLesson.partials.sectionTwo')
                    </div>
                    <div class="bio layout-spacing ">
                        @include('pages.studentLesson.partials.sectionThird')
                    </div>
                    <div class="widget-content widget-content-area br-6">
                        @include('pages.studentLesson.partials.newLessons')
                    </div>
                    <div class="bio layout-spacing ">
                        @if ($studentLessonReview)
                            @include('pages.studentLesson.partials.studentLessonReview')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')

    <script src="{{ asset('adminAssets/plugins/table/datatable/datatables.js') }}"></script>
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

@endpush
