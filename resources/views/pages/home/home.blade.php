@extends('master')

@push('css')
    <!-- BEGIN THEME GLOBAL STYLES -->
   

    <link href="{{asset('adminAssets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('adminAssets/plugins/fullcalendar/custom-fullcalendar.advance.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('adminAssets/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('adminAssets/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('adminAssets/assets/css/forms/theme-checkbox-radio.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminRtl/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">

    <!-- END THEME GLOBAL STYLES -->
@endpush

@section('breadcrumb')
<div class="col-md-12">
    <div class="breadcrumb bg-transparent">

        <div class="breadcrumb-four">
            <ul class="breadcrumb">
                <li class="active">
                    <a href="{{route('admin.home')}}"
                       class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-house mx-2 fa-2x"></i>
                        <span class="font-weight-bold mt-1">الصفحة الرئيسية</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="text-center w-100">

        <div class="row mb-5">
            <div class="col-12">
                @include('pages.home.partials.calendar')
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card" style="min-height: 550px">
                    <div class="card-header home">
                        <h3>Group Ages</h3>
                    </div>
                    <div class="card-body">
                        <div class="" id="groupAgesChart" data-href="{{ route('admin.group.groupAgesChartData') }}">

                            <div class="" id="groupAgesChartCanvaParent" style="position: relative;height: 500px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12">
                <div class="card" style="min-height: 550px">
                    <div class="card-header home">
                        <h3>Total Payments</h3>
                    </div>
                    <div class="card-body">
                        <div class="" id="totalPaymentsChart" data-href="{{ route('admin.payment.totalPaymentsChartData') }}">

                            <div class="" id="totalPaymentsChartCanvaParent" style="position: relative;height: 500px;">
                                {{-- <canvas id="totalPaymentsChartCanva"></canvas> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        {{-- <div class="px-3" id="paymentsThisMonthContainer"
            data-href="{{ route('admin.payment.getPaymentPerMonthThisYear') }}">

            <div class="row align-items-center">
                <div class="col-8 layout-spacing" id="canvas">
                    <div id="content-tables-search">
                        <!-- content tables search -->
                    </div>
                    <canvas id="paymentsThisMonthChart">
                        <!-- payments this month chart -->
                    </canvas>
                </div>

                <div class="col-4 layout-spacing">
                    
                </div>
            </div>

        </div> --}}


    </div>
@endsection

@vite(['resources/js/home/home.js'])

@push('js')
    
    <script src="{{asset('adminAssets/plugins/chartjs/main.js')}}"></script>

    {{-- <script type="module" src="{{ asset('js/home/home.js') }}"></script> --}}

    <script src="{{asset('adminAssets/plugins/fullcalendar/moment.min.js')}}"></script>

    <script src="{{ asset('adminAssets/plugins/flatpickr/flatpickr.js') }}"></script>

    <script src="{{asset('adminAssets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>

    <script type="module" src="{{asset('js/home/home.js')}}"></script>
@endpush
