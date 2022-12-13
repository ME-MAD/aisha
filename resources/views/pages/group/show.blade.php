@extends('master')

@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/components/cards/card.css') }}
    " rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminAssets/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <!--  BEGIN CUSTOM STYLE Data Table  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/dt-global_style.css') }}">
    <!--  END CUSTOM  Data Table  -->
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link href="{{ asset('adminAssets/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/assets/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('adminAssets/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL CUSTOM STYLES -->
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h5 class="text-dark">This is Group :</h5>
            <h3 class="text-primary"> {{ $group->from }} : {{ $group->to }}</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Group</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.home') }}">Home</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.group.index') }}">Groups</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                    href="{{ route('admin.group.create') }}">Create Group</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            {{-- <div class="row layout-top-spacing"> --}}

            <div class="col-xl-12 col-lg-12 col-md-12">
                <ul class="nav nav-pills mb-3 mt-3 nav-fill" id="justify-pills-tab1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="justify-pills-teacher-tab" data-toggle="pill"
                            href="#justify-pills-teacher" role="tab" aria-controls="justify-pills-teacher"
                            aria-selected="true">Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="justify-pills-groupDays-tab" data-toggle="pill"
                            href="#justify-pills-groupDays" role="tab" aria-controls="justify-pills-groupDays"
                            aria-selected="false">Group Days
                            @if ($groupDaysCount < $groupTypeNumDays)
                                <span class="badge badge-danger float-right">{{ $groupDaysCount }}</span>
                            @else
                                <span class="badge badge-success float-right">{{ $groupDaysCount }}</span>
                            @endif

                        </a>

                    </li>
                </ul>
                <div class="tab-content" id="justify-pills-tabContent">
                    <div class="tab-pane fade show active" id="justify-pills-teacher" role="tabpanel"
                        aria-labelledby="justify-pills-teacher-tab">
                        @include('pages.group.partials.teacher')
                    </div>

                    <div class="tab-pane fade" id="justify-pills-groupDays" role="tabpanel"
                        aria-labelledby="justify-pills-groupDays-tab">
                        @include('pages.group.partials.groupDays')
                        @include('pages.groupDays.createModal')
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12">
                <ul class="nav nav-pills mb-3 mt-3 nav-fill" id="justify-pills-tab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="justify-pills-students-tab" data-toggle="pill"
                            href="#justify-pills-students" role="tab" aria-controls="justify-pills-students"
                            aria-selected="true">
                            Students
                            <span class="badge badge-secondary float-right">{{ $countStudents }}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="justify-pills-payment-tab" data-toggle="pill"
                            href="#justify-pills-payment" role="tab" aria-controls="justify-pills-payment"
                            aria-selected="false">Payment
                            <span id="paymentsCount" class="badge badge-secondary float-right">0</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="justify-pills-tabContent">
                    <div class="tab-pane fade show active" id="justify-pills-students" role="tabpanel"
                        aria-labelledby="justify-pills-students-tab">
                        @include('pages.group.partials.students')
                        @include('pages.groupStudent.createModal')
                    </div>

                    <div class="tab-pane fade" id="justify-pills-payment" role="tabpanel"
                        aria-labelledby="justify-pills-payment-tab">
                        @include('pages.group.partials.payment')

                    </div>
                </div>

            </div>
            {{-- </div> --}}
        </div>
    </div>
@endsection




@section('javascript')
    <script src="{{ asset('adminAssets/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('js/payment.js') }}"></script>
    <script>
        $('#zero-config').DataTable({
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
    <script>
        $('#zero-config2').DataTable({
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
    <script>
        $('#zero-config3').DataTable({
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
            "pageLength": 7,
            "fnDrawCallback": function(){
                whenMonthChangeHandlePaymentCheckBox()
            }
        });
    </script>











    <script>
        $('#creatGroupDayModal').on('shown.bs.modal', function(e) {
            let href = $(this).data('href');
            let group_id = $('#group_id').data('groupid');
            $(`option`).removeAttr('disabled').css({
                'color': 'black'
            });
            $.ajax({
                url: href,
                data: {
                    group_id
                },
                success: function(response) {
                    let groupDays = response.groupDays
                    groupDays.forEach(element => {
                        let groupDay = element.day
                        $(`option[value=${groupDay}]`).attr('disabled', true).css({
                            'color': 'red'
                        })
                    });


                },
                error: function() {}
            })
        })
    </script>
@endsection
