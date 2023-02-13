@extends('master')

@push('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">
    <link href="{{asset('adminAssets/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/dt-global_style.css') }}"> --}}

    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <link href="{{asset('adminRtl/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
    @else
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
                        <li class="active">
                            <a href="{{route('admin.role.index')}}"
                               class="d-flex justify-content-center align-items-center">

                                <i class="fa-solid fa-fingerprint fa-2x mx-2"></i>
                                <span class="font-weight-bold ">الوظائف</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between align-items-center card__header__for_tables">
                        <h3 class="text-capitalize text-white">
                            {{__('roles.roles')}}
                        </h3>
                        @check_permission('store-role')
                        <a class="icon text-white" href="{{route('admin.role.create')}}">
                            <i class="fa-solid fa-plus fa-2xl"></i>
                        </a>
                        @endcheck_permission
                    </div>
                    <div class="card-body">
                        {!! $dataTable->table
                            ([
                                     'class' => 'table table-striped dt-table-hover dataTable ',
                                     'style' => 'width:100%'
                                 ],true,
                            )
                        !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.role.showModal')
@endsection


@push('js')

    <script src="{{ asset('adminAssets/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/buttons.server-side.js')}}"></script>


    {!! $dataTable->scripts() !!}

    <script src="{{asset('js/role/indexPage.js')}}"></script>

@endpush
