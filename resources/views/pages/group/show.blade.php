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
     <link href="{{asset('adminRtl/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
        
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
      <link href="{{asset('adminAssets/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
    @endif
@endpush

@section('breadcrumb')
<div class="row my-3 ">
    <div class="col-md-12">
        <div class="breadcrumb bg-transparent">

            <div class="breadcrumb-four">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('admin.home')}}"
                           class="d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-house mx-2 fa-2x"></i>
                            <span class="font-weight-bold mt-1">{{__('global.home')}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('admin.group.index')}}"
                           class="d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-users-rays fa-2x mx-2"></i>
                            <span class="font-weight-bold ">المجموعات</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('admin.group.index')}}"
                           class="d-flex justify-content-center align-items-center">
                            <i class="fa-regular fa-folder-open fa-2x mx-2"></i>
                            <span class="font-weight-bold ">{{ $group->name }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

                <div class="row">
                    <div class="col-xl-6 col-sm-12">
                        @include('pages.group.partials.teacher')
                        @include('pages.teacher.editModal')
                    </div>
                    <div class="col-xl-6 col-sm-12">
                        @include('pages.group.partials.groupDays')
                        @include('pages.groupDays.createModal')
                    </div>
                </div>

                <div class="row">
                    @include('pages.group.partials.students')
                    @include('pages.group.partials.payment')
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



    @include('pages.groupStudent.createModal')

@endsection

@push('js')
    <script type="module" src="{{ asset('js/payment/groupShow.js') }}"></script>
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

            console.log(href);
            $.ajax({
                url: href,
                data: {
                    group_id
                },
                success: function (response) {
                    let groupDays = response.groupDays
                    console.log(groupDays);
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
