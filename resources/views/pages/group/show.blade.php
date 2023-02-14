@extends('master')

@push('css')


    <link href="{{asset('adminAssets/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('adminRtl/assets/css/forms/theme-checkbox-radio.css') }}">

    @if(LaravelLocalization::getCurrentLocale() =='ar')
        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/assets/css/users/user-profile.css') }}"/>

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/assets/css/components/custom-modal.css') }}"/>

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminRtl/assets/css/components/cards/card.css') }}"/>
    @else
        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/assets/css/users/user-profile.css') }}"/>

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/assets/css/components/custom-modal.css') }}"/>

        <link rel="stylesheet"
              type="text/css"
              href="{{ asset('adminAssets/assets/css/components/cards/card.css') }}"/>
    @endif
@endpush

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h5 class="text-dark">{{ __('group.This is Group :') }}</h5>
            <h3 class="text-primary"> {{ $group->from }} : {{ $group->to }}</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><span
                        class="text"><span>{{ __('global.Show') }}</span> :
                    {{ __('global.Dail Analytics') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                   href="{{ route('admin.home') }}">{{ __('global.HOME') }}</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                   href="{{ route('admin.group.index') }}">{{ __('global.groups') }}</a>
                {{-- <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                    href="{{ route('admin.group.create') }}">Create Group</a> --}}
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <ul class="nav nav-pills mb-3 mt-3 nav-fill" id="justify-pills-tab1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="justify-pills-teacher-tab" data-toggle="pill"
                           href="#justify-pills-teacher" role="tab" aria-controls="justify-pills-teacher"
                           aria-selected="true">{{ __('group.Teacher') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="justify-pills-groupDays-tab" data-toggle="pill"
                           href="#justify-pills-groupDays" role="tab" aria-controls="justify-pills-groupDays"
                           aria-selected="false">{{ __('group.Group Days') }}
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
                            {{ __('group.Students') }}
                            <span class="badge badge-secondary float-right">{{ $countStudents }}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="justify-pills-payment-tab" data-toggle="pill"
                           href="#justify-pills-payment" role="tab" aria-controls="justify-pills-payment"
                           aria-selected="false"> {{ __('group.Payment') }}
                            <span id="paymentsCount" class="badge badge-secondary float-right">{{$groupPaymentsCount}}</span>
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

                <div class="card component-card_4 col-sm-12">
                    <div class="row" id="paymentsThisMonthContainerGroup"
                         data-href="{{ route('admin.group.getPaymentPerMonth', $group->id) }}">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing" id="canvas">
                            <canvas id="paymentsThisMonthChartOnGroupShow"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.teacher.editModal')
@endsection

@push('js')
    <script type="module" src="{{ asset('js/payment/groupShow.js') }}"></script>
    <script src="{{ asset('js/teacher.js') }}"></script>
    <script src="{{ asset('adminAssets/assets/shared/chart.js') }}"></script>
    <script src="{{ asset('js/group_chart.js') }}"></script>
    
    <script>
        initEditeTeacherModal()
    </script>

    <script>
        $('#creatGroupDayModal').on('shown.bs.modal', function (e) {
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
                success: function (response) {
                    let groupDays = response.groupDays
                    groupDays.forEach(element => {
                        let groupDay = element.day
                        $(`option[value=${groupDay}]`).attr('disabled', true).css({
                            'color': 'red'
                        })
                    });


                },
                error: function () {
                }
            })
        })
    </script>
    <script>
        $('#creatGroupStudentModalInGroupShow').on('click', function () {

            let href = $(this).data('href');
            let group_id = $(this).data('group_id');

            $(`option`).removeAttr('disabled').css({
                'color': 'black'
            });
            $.ajax({
                url: href,
                data: {
                    group_id
                },
                success: function (response) {
                    let groupStudents = response.groupStudents

                    groupStudents.forEach(element => {
                        let student = element.student_id

                        $(`#student_id option[value=${student}]`).attr('disabled', true).css({
                            'color': 'red'
                        })
                    });
                },
                error: function () {
                }
            })
        })
    </script>
@endpush
